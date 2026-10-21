<?php
use Orig\Thing;
use Orig\Base;
use Orig\Contract;

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }
$y = 5;
$c1 = function (Thing $t) use ($y): Thing { return $t; };
$c2 = function (Thing $t) use (&$y): ?Base { return null; };
$c3 = fn(Thing $t): Thing => $t;
$c4 = static fn(?Base $b = null, Thing|Contract ...$r): Base|Thing|null => $b;
$c5 = static function (Thing $t) use ($y, $c1): Thing|Base { return $c1($t); };
$c6 = fn(): (Thing&Contract)|null => null;
$c7 = fn(Thing $x = new Thing) => fn(Base $b): Base => $b;
$c8 = function &(Thing $t): Thing { return $t; };

foreach (['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8'] as $n) {
    $rf = new ReflectionFunction($$n);
    echo $n, ': ', $rf->getReturnType() ?? '-', ' <- ';
    foreach ($rf->getParameters() as $p) echo $p->getType(), ',';
    echo "\n";
}
echo get_class($c1(new Repl\Thing)), ' ', get_class($c3(new Repl\Thing)), ' ', get_class($c7()(new Repl\Base)), "\n";
foreach (['c1', 'c3', 'c5', 'c8'] as $n) {
    try { $$n(orig('Orig\Thing')); echo "$n accepted\n"; } catch (TypeError) { echo "$n rejects\n"; }
}
try { $c7(orig('Orig\Thing')); echo "c7 accepted\n"; } catch (TypeError) { echo "c7 rejects\n"; }
try { $c7()(orig('Orig\Base')); echo "c7 inner accepted\n"; } catch (TypeError) { echo "c7 inner rejects\n"; }
// return type enforcement
$bad = function () use ($y): Thing { return orig('Orig\Thing'); };
try { $bad(); echo "bad accepted\n"; } catch (TypeError $e) { echo "bad return rejected\n"; }
$bad2 = fn(): Base => orig('Orig\Base');
try { $bad2(); echo "bad2 accepted\n"; } catch (TypeError $e) { echo "bad2 return rejected\n"; }
// in expressions: ternary inside closure after return type with colon
$z = $y ? function (Thing $t): Thing { return $t; } : fn(Base $b): Base => $b;
echo (new ReflectionFunction($z))->getReturnType(), "\n";
$w = $y ? fn(): Thing => new Thing : null;
echo get_class($w()), "\n";
