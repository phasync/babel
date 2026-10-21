<?php
// Usage: php -d auto_prepend_file=tests/e2e/boot.php <entry script> args...
// Runs the entry script with everything it includes translated with the generated pass-through map,
// through the test include wrapper (tests/IncludeWrapper.php, the role of a consumer's stream wrapper).
// Environment: E2E_COUNTS (file the hook call counts are appended to as JSON),
//              E2E_CLASSES=1 (also apply tests/e2e/classmap.php), E2E_OFF=1 (do nothing: baseline run),
//              E2E_SKIP (colon-separated extra path prefixes that are not translated),
//              E2E_UNHOOK (comma-separated functions to leave out of the map),
//              E2E_NSFALLBACK=0 (no run time namespace fallback check: to measure what it costs).
if (getenv('E2E_OFF') !== '1') {
    $__e2e_root = \dirname(__DIR__, 2);
    foreach (['Babel', 'Unit', 'Runtime', 'shims', 'shims-strict'] as $__e2e_f) {
        require_once $__e2e_root . '/src/' . $__e2e_f . '.php'; // before the wrapper: it must not translate itself
    }
    require_once $__e2e_root . '/tests/IncludeWrapper.php';
    require __DIR__ . '/gen/hooks.php';
    (static function () use ($__e2e_root): void {
        $map = require __DIR__ . '/gen/map.php';
        foreach (array_filter(explode(',', (string) getenv('E2E_UNHOOK'))) as $fn) {
            unset($map['functions'][$fn]); // to confirm that a difference comes from a given hook
        }
        $classes = [];
        $skip = [__DIR__ . '/gen/', $__e2e_root . '/src/', __FILE__];
        foreach (array_filter(explode(':', (string) getenv('E2E_SKIP'))) as $p) {
            $skip[] = $p;
        }
        if (getenv('E2E_CLASSES') === '1') {
            require __DIR__ . '/classmap-impl.php';
            $classes = require __DIR__ . '/classmap.php';
            $skip[] = __DIR__ . '/classmap-impl.php';
        }
        $babel = new \phasync\Babel\Babel($map['functions'], $classes, true, getenv('E2E_NSFALLBACK') !== '0');
        \phasync\Babel\Runtime::configure($babel);
        if ($f = getenv('E2E_COUNTS')) {
            register_shutdown_function(static function () use ($f) {
                file_put_contents($f, json_encode(['pid' => getmypid(), 'n' => \E2E\C::$n]) . "\n", FILE_APPEND | LOCK_EX);
            });
        }
        \phasync\Babel\Tests\IncludeWrapper::register($babel, $skip);
    })();
    unset($__e2e_root, $__e2e_f);
    $__e2e_entry = realpath($_SERVER['SCRIPT_FILENAME']);
    if ($__e2e_entry !== false) {
        // the entry script is opened by the SAPI itself, before the wrapper: run it translated here
        require $__e2e_entry;
        exit(0);
    }
    unset($__e2e_entry);
}
