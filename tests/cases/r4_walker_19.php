<?php
$s = 'strtoupper'; $g = fn() => 'strtoupper'; $f = fn() => 'Orig\Thing'; $c = 'Orig\Thing';
$o = new class { public $c = 'Orig\Thing'; public $s = 'strtoupper'; function m() { return $this; } };
$r = new Repl\Thing; $n = null;
echo 1, call_user_func($g(), 'a'), call_user_func("{$s}", 'b'), call_user_func("{$g()}", 'c'), "\n";
echo 2, var_export(is_a($r, $o?->c::who()), true), var_export(is_a($r, $f()), true), var_export(is_a($r, "{$f()}"), true), "\n";
echo 3, var_export(class_exists($o->m()?->c), true), var_export(method_exists($f(), 'who'), true), "\n";
echo 4, call_user_func([$o?->c, 'who']), call_user_func([$f(), 'who']), call_user_func("{$o->c}::who"), "\n";
echo 5, call_user_func($o->m()->m()->s, 'x'), call_user_func(($o?->s), 'y'), call_user_func(fn() => $s('z')), "\n";
echo 6, implode(',', array_filter(['a'], $g())), "\n";
echo 7, var_export(is_a($r, $n?->c::who() ?? $c), true), "\n";
echo 8, (new ReflectionClass($f()))->getName(), (new ReflectionClass("{$f()}"))->getName(), "\n";
echo 9, call_user_func_array($g(), ['q']), "\n";
