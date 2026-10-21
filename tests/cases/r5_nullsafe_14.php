<?php
// Chains as arguments of class-name functions, keyword member names, nested chains in arguments, ?? in arguments, generators with yield inside the chain.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $self; public $nul = null; public $list = 'Orig\Thing'; public $class = 'Orig\Thing'; public $fn = 'H';
  public function __construct() { $this->self = $this; }
  public static function id($x) { return $x; }
  public static function list() { return 'Orig\Thing'; }
  public static function &ref(array &$x) { $x[] = 1; return $x; } }
$a = new H; $z = null; $n = 'b'; $nn = 'n';
t(fn() => is_a($a?->b::who(), 'Repl\Thing', true));
t(fn() => is_a($a?->b, 'Repl\Thing', true));
t(fn() => class_exists($a?->self::id('Orig\Thing')));
t(fn() => $a?->list::who());
t(fn() => $a?->class::who());
t(fn() => $a?->self::list()::who());
t(fn() => $a?->$n::who());
t(fn() => $a?->$$nn::who());
t(fn() => $a?->{$n}::who());
t(fn() => $a?->self::id($a?->b::who()));
t(fn() => $a?->self::id($z?->b::who(tr(1))));
t(fn() => $z?->self::id($a?->b::who(tr(2))));
t(fn() => $a?->self::id(tr(3) ?? tr(4)));
t(fn() => $a?->self::id($z?->b ?? 'dd'));
function g($a) { $x = yield 1; echo "got $x\n"; return $a?->self::id(yield $a?->b::who()); }
$gen = g($a); var_dump($gen->current()); var_dump($gen->send('S')); $gen->send('T'); var_dump($gen->getReturn());
$gen = g(null); var_dump($gen->current()); var_dump($gen->send('S')); var_dump($gen->getReturn());
