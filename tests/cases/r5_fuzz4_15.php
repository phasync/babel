<?php
// a class or function name with two leading backslashes is not a valid name for PHP (only one is
// stripped): it must not be mapped, neither as a literal nor at run time
$x = '\\\\Orig\Thing'; $y = '\\\\strtoupper';
foreach ([
    fn () => $x::who(), fn () => class_exists($x), fn () => new $x, fn () => call_user_func($x . '::who'),
    fn () => $y('a'), fn () => call_user_func($y, 'b'), fn () => '\\\\Orig\Thing'::who(), fn () => call_user_func_array('\\\\strtoupper', ['c']),
    fn () => class_exists('\\\\Orig\Thing'), fn () => is_a('Orig\Thing', '\\\\Orig\Thing', true),
] as $i => $c) {
    try { var_dump($c()); } catch (\Throwable $e) { echo $i, ' ', get_class($e), ': ', $e->getMessage(), "\n"; }
}
