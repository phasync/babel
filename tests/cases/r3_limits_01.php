<?php
// Former known limits: callables, variable calls, member strings, spread/first-class class-name functions.
namespace lim;
use Orig\Thing;
$f = 'fopen';
echo $f('x'), ' ', ('sleep')(1), ' ', call_user_func('usleep', 1), ' ', call_user_func_array('\fopen', ['x']), "\n";
$cbs = ['k' => 'strtoupper'];
echo $cbs['k']('a'), ' ', implode(',', \array_filter(['a'], 'is_string')), "\n";
echo call_user_func('Orig\Thing::who'), ' ', call_user_func(['Orig\Thing', 'who']), ' ', \Closure::fromCallable('sleep')(1), "\n";
$m = 'Orig\Thing::who';
echo $m(), ' ', constant('Orig\Thing::X'), ' ', constant($m === '' ? '' : 'Orig\Thing::X'), ' ', var_export(defined('Orig\Thing::X'), true), "\n";
$args = [new \Repl\Thing, 'Orig\Thing'];
var_dump(is_a(...$args));
$isA = is_a(...);
var_dump($isA(new \Repl\Thing, 'Orig\Thing'), class_exists(...['Orig\Base']));
echo @(new \ReflectionMethod('Orig\Thing::who'))->class, ' ', \ReflectionMethod::createFromMethodName('Orig\Thing::who')->class, "\n";
echo "{$f('y')} {$cbs['k']('b')}\n";
