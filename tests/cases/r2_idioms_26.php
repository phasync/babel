<?php
namespace Errors;

use Orig\Err as DomainError;
use PDO, PDOException;

final class Handler
{
    /** @var array<class-string, string> */
    private array $levels = [DomainError::class => 'warning', PDOException::class => 'critical', \Orig\Err::class => 'dup'];

    public function report(\Throwable $e): string
    {
        foreach ($this->levels as $cls => $lvl) {
            if ($e instanceof $cls) {
                return $lvl . ':' . $e::class;
            }
        }
        return 'unknown:' . get_class($e);
    }

    public function render(\Throwable $e): string
    {
        return match (true) {
            $e instanceof DomainError => 'domain',
            $e instanceof PDOException => 'db',
            default => 'other',
        };
    }
}

function risky(int $i): never
{
    throw match ($i) {
        0 => new DomainError('zero'),
        1 => new PDOException('db', previous: new DomainError('inner')),
        default => new \LogicException('x'),
    };
}

$h = new Handler;
for ($i = 0; $i < 3; $i++) {
    try {
        risky($i);
    } catch (DomainError|PDOException $e) {
        echo $h->report($e), ' ', $h->render($e), ' ', $e->getPrevious() ? get_class($e->getPrevious()) : '-', "\n";
    } catch (\Exception) {
        echo "caught other\n";
    } finally {
        echo "finally $i\n";
    }
}
$fn = fn (?PDO $db = null) => $db ?? throw new DomainError('no db');
try { $fn(); } catch (DomainError $e) { echo get_class($e), ' ', $e->getMessage(), "\n"; }
set_exception_handler(static function (\Throwable $e) use ($h): void { echo 'handler: ', $h->report($e), "\n"; });
throw new DomainError('uncaught');
