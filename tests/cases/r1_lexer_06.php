<?php
declare(strict_types=1);
function f(Orig\Thing|PDO $a) { return get_class($a); }
$rc = 'Reflection' . 'Class';
$real = (new $rc(strrev('ODP')));
echo f(new Repl\Thing), "\n";
$pdo = $real->newInstanceWithoutConstructor();
echo get_class($pdo), "\n";
try { f($pdo); echo "no error\n"; } catch (TypeError $e) { echo "TE\n"; }
$ot = (new $rc('Orig' . '\Thing'))->newInstance();
echo get_class($ot), "\n";
