<?php
namespace combo;
class N { const A = 'Orig\Thing'; const B = 'Orig\Err'; public static $s = 'Orig\Base'; }
$r = new \Repl\Thing; $n = 'combo\N'; $j = fn($v) => var_export($v, true);
echo $j(is_a($r, fopen('x') ?: 'Orig\Thing')), $j(is_a($r, $n::A)), $j(is_a($r, N::A)), $j(is_a($r, $n::$s)), $j(class_exists($n::B)), "\n";
echo $j(is_a($r, sleep(1) ? 'Orig\Thing' : 'Orig\Thing')), $j(is_a($r, strtoupper('orig\thing'))), $j(is_a(new \Repl\Base, is_a($r, 'Orig\Thing') ? 'Orig\Base' : 'x')), "\n";
echo $j(is_a(is_a($r, 'Orig\Thing') ? $r : null, 'Orig\Thing')), $j(is_a($r, (static function () use ($r) { return is_a($r, 'Orig\Base') ? 'a' : 'Orig\Thing'; })())), "\n";
echo $j(method_exists(get_parent_class(new \Repl\Err) , 'getMessage')), $j(get_parent_class(get_parent_class(new \Repl\Err))), "\n";
