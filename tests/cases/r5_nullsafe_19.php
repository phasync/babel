<?php
// Keyword member names, match, closures, $this?->, destructuring, ??, ?:, <=>, unary and arithmetic operators, print, .=, ??=, clone, throw around chains.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $nul = null; public $self; public $list = 'Orig\Thing'; public $fn = 'Orig\Thing'; public $new = 'Orig\Thing';
  public function __construct() { $this->self = $this; }
  public static function id($x) { return $x; }
  public static function list($x = null) { return 'Orig\Thing'; }
  public static function new() { return 'Orig\Thing'; }
  public static function default() { return 'Orig\Thing'; } }
$a = new H; $z = null;
t(fn() => $a?->list::who());
t(fn() => $a?->fn::who());
t(fn() => $a?->new::who());
t(fn() => $a?->self::list()::who());
t(fn() => $a?->self::new()::who());
t(fn() => $a?->self::default()::who());
t(fn() => $z?->self::default(tr(1))::who());
t(fn() => match ($a?->self::new()::who()) { 'Repl\Thing' => 'm-repl', default => 'm-other' });
t(fn() => match (true) { $z?->self::new()::who() === null => 'm-null', default => 'm-x' });
$r = (static function () use ($a, $z) { return [$a?->b::who(), $z?->b::who(tr(2))]; })();
var_dump($r);
$g = function () { return $this?->b::who(); };
t(Closure::bind($g, $a, H::class));
[$p, $q] = [$a?->b::who(), $a?->self?->b::$p];
var_dump($p, $q);
['k' => $k] = ['k' => $a?->b::X ?? 'no'];
var_dump($k);
t(fn() => $a?->self::id($z?->b ?? $a?->b::who()));
t(fn() => $a?->self::id($z?->b::$p ?? $a?->b::$p));
t(fn() => $a?->self::id(tr(5)) ?? tr(6));
t(fn() => $z?->self::id(tr(7)) ?? tr(8));
t(fn() => $z?->self::id(tr(7)) ?: tr(9));
t(fn() => $a?->b::who() ?: 'e');
t(fn() => $a?->b::who() <=> 'Repl\Thing');
t(fn() => $a?->b::who() == 'Repl\Thing' && $z?->b::who() === null);
t(fn() => !$z?->b::who());
t(fn() => -$a?->self::id(3) ** 2);
t(fn() => (int) $a?->self::id('4') + 1);
t(fn() => @$a?->self::id(5));
t(fn() => print $a?->b::who());
t(function () use ($a) { $x = 'A'; $x .= $a?->b::who(); return $x; });
t(function () use ($a) { $x = null; $x ??= $a?->b::who(); return $x; });
t(fn() => get_class(clone $a?->self::id($a)));
t(fn() => throw new Exception($a?->b::who()));
