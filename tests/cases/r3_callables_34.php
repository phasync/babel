<?php
// callables built from ::class constants, constants and enum cases at run time
namespace R3cb34;
use Orig\Thing;
use Orig\Thing as T;
const CB = 'Orig\Thing::who';
enum E: string { case W = 'Orig\Thing::who'; }
echo call_user_func([Thing::class, 'who']), "\n";
echo call_user_func(T::class . '::who'), "\n";
echo call_user_func(CB), ' ', call_user_func(E::W->value), "\n";
$cb = [T::class, 'who'];
echo $cb(), "\n";
echo array_reduce([1], fn($c, $i) => $c . call_user_func([Thing::class, 'who']), ''), "\n";
