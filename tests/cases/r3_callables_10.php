<?php
// class-name function shims must keep non-strict coercion of the caller (this file is not strict)
class R3cb10 {}
$o = new R3cb10;
$args = [$o, 'R3cb10', 1];
var_dump(is_a(...$args));
$f = 'is_a';
var_dump($f($o, 'R3cb10', 1));
var_dump(call_user_func('is_a', $o, 'R3cb10', 1));
var_dump(class_exists(...['R3cb10', 1]));
$h = is_subclass_of(...);
var_dump($h($o, 'R3cb10', 1));
