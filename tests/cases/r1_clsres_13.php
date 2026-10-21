<?php
namespace refl;
use ReflectionClass as RC;
use ReflectionMethod;
use Orig\Thing;
$j = fn($v) => var_export($v, true);
echo (new RC('Orig\Thing'))->name, ' ', (new RC(Thing::class))->name, ' ', (new RC(new \Repl\Thing))->name, "\n";
echo (new \reflectionclass('Orig\Base'))->name, ' ', (new ReflectionMethod('Orig\Thing', 'who'))->class, "\n";
echo (new ReflectionMethod(new \Repl\Thing, 'who'))->class, "\n";
echo (new \ReflectionClass('Orig' . '\Thing'))->name, ' ', (new \ReflectionClass(true ? 'Orig\Thing' : 'x'))->name, ' ', (new \ReflectionClass(__NAMESPACE__ === 'refl' ? 'Orig\Err' : 'x'))->name, "\n";
$n = 'Orig\Thing';
echo $j(is_a(new \Repl\Thing, 'Orig' . '\Thing')), $j(is_a(new \Repl\Thing, $n)), $j(is_a(new \Repl\Thing, $n ?: 'x')), $j(is_a(new \Repl\Thing, ['Orig\Thing'][0])), $j(is_a(new \Repl\Thing, strrev('gnihT\giro') === 'x' ? 'y' : ucfirst('orig\Thing'))), $j(is_a(new \Repl\Thing, "Orig\\{$n}")), "\n";
$k = 'Thing';
echo $j(is_a(new \Repl\Thing, "Orig\\$k")), $j(is_a(new \Repl\Thing, 'Orig\\' . $k)), $j(is_a(new \Repl\Thing, (static fn($a, $b) => $a . $b)('Orig\\', 'Thing'))), $j(is_a(new \Repl\Thing, match(true) { default => 'Orig\Thing', })), $j(is_a(new \Repl\Thing, 'Orig\Thing',)), "\n";
