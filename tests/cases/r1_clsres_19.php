<?php
namespace ci;
use ReflectionClass;
$r = new \Repl\Thing;
$j = fn($v) => var_export($v, true);
echo $j(IS_A($r, 'orig\THING')), $j(\Is_A($r, '\ORIG\thing')), $j(Is_Subclass_Of('Repl\Err', 'ORIG\err')), $j(Is_Subclass_Of('Repl\Err', 'ORIG\err', true)), "\n";
echo $j(is_a($r, <<<'X'
Orig\Thing
X)), $j(is_a($r, <<<X
Orig\Thing
X, false)), "\n";
echo (new REFLECTIONCLASS /* c */ ( /* d */ 'orig\thing' /* e */ ))->name, ' ', (new \reflectionClass('ORIG\BASE'))->name, "\n";
echo (
    new ReflectionClass(
        'Orig\Err',
    )
)->getParentClass()->name, "\n";
echo $j(is_a(
    $r,
    // comment, with, commas
    'Orig\\Thing' /* trailing */,
)), "\n";
echo $j(is_a($r, 'Orig\Thing' . /* x */ '')), $j(is_a($r, (string) 'Orig\Thing')), $j(is_a($r, \strval('Orig\Thing'))), "\n";
