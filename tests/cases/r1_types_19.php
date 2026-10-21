<?php
namespace Lib;

use Orig\Err;
use Orig\Base;
use Orig\Thing;
use Orig\Contract;

// Exceptions: hierarchy built on a mapped exception, catch ordering, rethrow, finally, nested.
class MyErr extends Err { public function __construct(public readonly ?Thing $ctx = null) { parent::__construct('mine'); } }
final class Deeper extends MyErr implements Contract {}
function thrower(int $k) {
    return match ($k) {
        0 => throw new Err('plain'),
        1 => throw new MyErr(new Thing),
        2 => throw new Deeper,
        3 => throw new \LogicException('logic'),
        4 => throw new \Repl\Err('direct repl'),
        default => 'none',
    };
}
for ($k = 0; $k <= 5; $k++) {
    try {
        try { echo thrower($k), "\n"; }
        catch (Deeper $e) { echo 'Deeper ', get_class($e), ' ', $e->ctx === null ? 'noctx' : 'ctx', "\n"; throw $e; }
        catch (MyErr | \LogicException $e) { echo 'MyErr|Logic ', get_class($e), "\n"; }
        finally { echo "finally $k\n"; }
    } catch (Err $e) {
        echo 'outer Err ', get_class($e), ' ', $e->getMessage(), ' ', $e instanceof Contract ? 'contract' : 'plain', ' ', $e instanceof \Orig\Err ? 'orig' : 'other', "\n";
    }
}
echo implode(' > ', array_values(class_parents(Deeper::class))), "\n";
$e = new Deeper;
var_dump($e instanceof Err, $e instanceof \Exception, $e instanceof Base, $e instanceof Contract);
