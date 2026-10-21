<?php
declare(strict_types=1);
use Orig\Thing;
use Orig\Contract;
use Orig\Base as B;

function plain(Thing $x) { return 'ok'; }
function nullable(?Thing $x) { return 'ok'; }
function union(Thing|B|null $x) { return 'ok'; }
function variadic(Thing ...$x) { return count($x); }
function byref(Thing &$x) { return 'ok'; }
function byrefvar(?B &...$x) { return count($x); }
function dnf((Repl\Thing&Contract)|null $x, int|Thing $y = 1) { return 'ok'; }
function def(Thing $x = new Thing, $o = new \Orig\Base, $c = Thing::X, $k = Thing::class) { return get_class($x) . ' ' . get_class($o) . " $c $k"; }

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }
$r = new Repl\Thing; $o = orig('Orig\Thing');
foreach (['plain', 'nullable', 'union', 'variadic', 'byref'] as $f) {
    echo $f, ': ';
    echo $f($r), ' ';
    try { $f($o); echo "accepted orig!"; } catch (TypeError $e) { echo 'TypeError'; }
    echo "\n";
}
echo nullable(null), ' ', union(null), ' ', union(new Repl\Base), "\n";
var_dump(get_class($o));
try { union(orig('Orig\Base')); } catch (TypeError) { echo "union rejects Orig\\Base\n"; }
echo variadic($r, new Repl\Thing), "\n";
try { variadic($r, $o); } catch (TypeError) { echo "variadic rejects Orig\n"; }
$b1 = new Repl\Base; $b2 = null; echo byrefvar($b1, $b2), "\n";
echo def(), "\n";
foreach (['plain', 'nullable', 'union', 'variadic', 'byref', 'byrefvar', 'def', 'dnf'] as $f) {
    $rf = new ReflectionFunction($f);
    echo $f, ': ';
    foreach ($rf->getParameters() as $p) echo $p->getType(), ' ';
    echo "\n";
}
