<?php

declare(strict_types=1);

namespace phasync\Babel\Tests;

use phasync\Babel\Babel;

/**
 * Test-only file:// stream wrapper: files opened for include are served translated, everything else
 * goes to PHP's native file functions. It plays the role of the consumer's stream wrapper, which is
 * how phasync/babel is meant to be used; it is not part of the library.
 */
final class IncludeWrapper
{
    /** STREAM_OPEN_FOR_INCLUDE from php_streams.h; PHP passes it when include/require opens a file. */
    private const OPEN_FOR_INCLUDE = 0x80;
    /** STREAM_WILL_CAST from php_streams.h: the opener will cast the stream to a descriptor. */
    private const WILL_CAST = 0x20;
    private static ?Babel $babel = null;
    /** @var list<string> */
    private static array $skip = [];
    /** @var resource|null */
    public $context;
    /** @var resource|null */
    private $h;
    /** @var resource|null */
    private $d;
    /** proc_open() takes the file descriptor of a 'file' descriptor spec, see stream_close() */
    private bool $release = false;
    /** @var list<resource> */
    private static array $released = [];

    /** @param list<string> $skip path prefixes that are included untranslated */
    public static function register(Babel $babel, array $skip = []): void
    {
        self::$babel = $babel;
        self::$skip = $skip;
        \stream_wrapper_unregister('file');
        \stream_wrapper_register('file', self::class);
    }

    private static function native(callable $fn): mixed
    {
        // unregister first: restore() over a user wrapper keeps ~150 bytes per call until the request
        // ends (a long-running worker grows by kilobytes per request)
        \stream_wrapper_unregister('file');
        \stream_wrapper_restore('file');
        try {
            return $fn();
        } finally {
            \stream_wrapper_unregister('file');
            \stream_wrapper_register('file', self::class);
        }
    }

    /** Runs $fn with its warnings discarded: neither error handlers nor error_get_last() see them. */
    private static function silent(callable $fn): mixed
    {
        \set_error_handler(static fn (): bool => true);
        try {
            return $fn();
        } finally {
            \restore_error_handler();
        }
    }

    public function stream_open(string $path, string $mode, int $options, ?string &$opened): bool
    {
        if ($options & self::OPEN_FOR_INCLUDE) {
            $real = self::native(fn () => \realpath($path));
            $src = $real === false || !self::native(fn () => \is_file($real)) ? false : self::native(fn () => @\file_get_contents($real));
            if ($src === false) {
                return false;
            }
            foreach (self::$skip as $prefix) {
                if (\str_starts_with($real, $prefix)) {
                    $this->h = \fopen('php://memory', 'w+b');
                    \fwrite($this->h, $src);
                    \rewind($this->h);
                    $opened = $real;

                    return true;
                }
            }
            $this->h = \fopen('php://memory', 'w+b');
            \fwrite($this->h, self::$babel->translate($src, $real));
            \rewind($this->h);
            $opened = $real;

            return true;
        }
        // proc_open() casts the stream to a file descriptor with PHP_STREAM_CAST_RELEASE and closes it
        // at once: a native stream then hands the descriptor over, but a user stream's close closes it
        // before the child is spawned ("posix_spawn() failed: Bad file descriptor").
        $this->release = ($options & self::WILL_CAST) !== 0
            && (\debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'] ?? '') === 'proc_open';
        // Silent: when the open fails PHP reports it once for the caller ('"...::stream_open" call
        // failed'), as it reports a native open once; the inner fopen()'s own warning would be a second.
        $usePath = (bool) ($options & \STREAM_USE_PATH);
        $this->h = self::native(fn () => self::silent(fn () => $this->context
            ? \fopen($path, $mode, $usePath, $this->context)
            : \fopen($path, $mode, $usePath)));

        return $this->h !== false;
    }

    public function stream_read(int $n): string|false { return \fread($this->h, $n); }
    public function stream_write(string $d): int|false { return \fwrite($this->h, $d); }
    public function stream_eof(): bool { return \feof($this->h); }
    public function stream_tell(): int|false { return \ftell($this->h); }
    public function stream_seek(int $o, int $w): bool { return \fseek($this->h, $o, $w) === 0; }
    public function stream_flush(): bool { return \fflush($this->h); }
    public function stream_close(): void
    {
        if ($this->release) {
            // proc_open() owns the descriptor now and closes it after the spawn; keeping the resource
            // alive is the nearest a user stream gets to a release (it closes the number once more
            // at shutdown).
            self::$released[] = $this->h;

            return;
        }
        \fclose($this->h);
    }
    public function stream_stat(): array|false { return \fstat($this->h); }
    public function stream_lock(int $op): bool { return $op === 0 || \flock($this->h, $op); } // 0: PHP asks whether locking works
    public function stream_truncate(int $size): bool { return \ftruncate($this->h, $size); }
    /** @return resource */
    public function stream_cast(int $as) { return $this->h; }

    public function stream_set_option(int $option, int $a1, ?int $a2): bool
    {
        return match ($option) {
            \STREAM_OPTION_BLOCKING => \stream_set_blocking($this->h, (bool) $a1),
            \STREAM_OPTION_READ_TIMEOUT => \stream_set_timeout($this->h, $a1, (int) $a2),
            \STREAM_OPTION_READ_BUFFER => \stream_set_read_buffer($this->h, $a1 === \STREAM_BUFFER_NONE ? 0 : (int) $a2) === 0,
            \STREAM_OPTION_WRITE_BUFFER => \stream_set_write_buffer($this->h, (int) $a2) === 0,
            default => false,
        };
    }

    public function stream_metadata(string $path, int $option, mixed $value): bool
    {
        return self::native(fn () => match ($option) {
            \STREAM_META_TOUCH => \touch($path, ...$value),
            \STREAM_META_OWNER_NAME, \STREAM_META_OWNER => \chown($path, $value),
            \STREAM_META_GROUP_NAME, \STREAM_META_GROUP => \chgrp($path, $value),
            \STREAM_META_ACCESS => \chmod($path, $value),
            default => false,
        });
    }

    public function url_stat(string $path, int $flags): array|false
    {
        // The native stater reports nothing (the caller, filemtime() and co., reports a failure itself;
        // file_exists() and co. report nothing); @ is not enough: error handlers still see the warning.
        return self::native(fn () => self::silent(fn () => $flags & \STREAM_URL_STAT_LINK ? \lstat($path) : \stat($path)));
    }

    public function unlink(string $path): bool { return self::native(fn () => $this->context ? \unlink($path, $this->context) : \unlink($path)); }
    public function rename(string $from, string $to): bool { return self::native(fn () => $this->context ? \rename($from, $to, $this->context) : \rename($from, $to)); }
    public function rmdir(string $path, int $options): bool { return self::native(fn () => $this->context ? \rmdir($path, $this->context) : \rmdir($path)); }

    public function mkdir(string $path, int $mode, int $options): bool
    {
        $rec = (bool) ($options & \STREAM_MKDIR_RECURSIVE);

        return self::native(fn () => $this->context ? \mkdir($path, $mode, $rec, $this->context) : \mkdir($path, $mode, $rec));
    }

    public function dir_opendir(string $path, int $options): bool
    {
        // silent for the reason given in stream_open()
        $this->d = self::native(fn () => self::silent(fn () => $this->context ? \opendir($path, $this->context) : \opendir($path)));

        return $this->d !== false;
    }

    public function dir_readdir(): string|false { return \readdir($this->d); }
    public function dir_rewinddir(): bool { \rewinddir($this->d); return true; }
    public function dir_closedir(): bool { \closedir($this->d); return true; }
}
