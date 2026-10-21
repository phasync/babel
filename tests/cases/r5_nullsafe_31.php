<?php
// A parenthesised callee that is called before the first ?-> ('(S::o(...))()?->b::m()'): the base of
// the nullsafe link is the call, not the callee in the parentheses.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
class S { public static $o; public static function o() { return S::$o; } public static function n() { return null; } }
class H { public $b = 'Orig\Thing'; }
S::$o = new H; $f = 'S::o';
t(fn() => (S::o(...))()?->b::who());
t(fn() => (S::n(...))()?->b::who());
t(fn() => ($f)()?->b::who());
t(fn() => (fn() => S::$o)()?->b::who());
