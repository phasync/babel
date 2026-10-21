<?php
// Evaluation order of side effects in chains (__get, __callStatic, arguments, skipped arguments) matches PHP.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class L { public static $log = []; }
function lg($x) { L::$log[] = is_object($x) ? "obj" : var_export($x, true); return $x; }
class H { public $self; public $b = 'Orig\Thing';
  public function __construct() { $this->self = $this; }
  public function __get($n) { lg("get:$n"); return $n === 'cls' ? 'Orig\Thing' : $this; }
  public function m(...$x) { lg('m'); return $this; }
  public static function id($x) { lg('id'); return $x; }
  public static function __callStatic($n, $a) { lg("cs:$n"); return 'Orig\Thing'; } }
$a = new H; $z = null;
L::$log = []; $r = lg($a)?->m(lg(1))?->cls::who(lg(2)); echo $r, ' ', implode(',', L::$log), "\n";
L::$log = []; $r = lg($a)?->m(lg(1))?->x?->y::id(lg(9) ? 'Orig\Thing' : '')::who(lg(3)); echo $r, ' ', implode(',', L::$log), "\n";
L::$log = []; $r = lg($a)?->m(lg(1))?->x?->y::zz(lg(2))::$p; echo $r, ' ', implode(',', L::$log), "\n";
L::$log = []; $r = lg($z)?->m(lg(1))?->x?->y::zz(lg(2))::$p; var_dump($r); echo implode(',', L::$log), "\n";
L::$log = []; $r = lg($a)?->x::zz(lg(1))::who() . lg($a)?->y::zz(lg(2))::who(); echo $r, ' ', implode(',', L::$log), "\n";
L::$log = []; $r = [lg($a)?->x::zz(lg(1))::who() => lg($a)?->y::zz(lg(2))::who()]; echo key($r), ' ', implode(',', L::$log), "\n";
L::$log = []; $r = lg($a)?->{lg('cls')}::who(lg(1)); echo $r, ' ', implode(',', L::$log), "\n";
L::$log = []; $r = lg($a)?->m(lg(1), lg($z)?->m(lg(2))::x(), lg(3))?->cls::who(); echo $r, ' ', implode(',', L::$log), "\n";
L::$log = []; $i = 0; $r = lg($a)?->m($i++, $i++)::zz($i++)::who($i++); echo $r, " $i ", implode(',', L::$log), "\n";
