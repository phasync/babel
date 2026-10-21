<?php
// First-class callables and callables built from dynamic classes
$c = 'Orig\Thing';
$f = $c::who(...);
echo $f(), "\n";
$o = new stdClass();
$o->c = $c;
$g = $o->c::who(...);
echo $g(), "\n";
echo (new ReflectionFunction($f))->getClosureScopeClass()->getName(), "\n";
$m = 'who';
echo $c::$m(), "\n";
echo $c::{'who'}(), "\n";
echo [$c, 'who'](), "\n";
echo ['Orig\Thing', 'who'](), "\n";
echo (['Orig\Thing', 'who'])(), "\n";
echo call_user_func([$c, 'who']), "\n";
