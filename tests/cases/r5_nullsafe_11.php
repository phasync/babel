<?php
// Basic nullsafe chain shapes with static access: calls, properties, ?? , peeled parentheses, operators, arrays, match, arrow fn, strings.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $n = null; public $self; public static $sp = 'Orig\Thing';
  public function __construct() { $this->self = $this; }
  public function m() { return 'Orig\Thing'; }
  public static function sm() { return 'Orig\Thing'; }
}
$a = new H; $z = null;
var_dump($a?->b::who());
var_dump($z?->b::who(tr(1)));
var_dump($a?->self?->b::who());
var_dump($a?->self?->n?->b::who(tr(2)));
var_dump($a?->b::$p);
var_dump($z?->b::$p ?? 'dflt');
try { var_dump($a?->n::$p ?? "d2"); } catch (Error $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; }
var_dump($a?->b::X);
var_dump((($a?->self)->b)::who());
var_dump(($a?->b)::who());
var_dump(($z?->b)::who(tr(3)));
$p = 'sp';
var_dump(H::$sp::who());
$cls = 'H';
var_dump($cls::$sp::who());
var_dump($a?->self::sm()::who());
var_dump($z?->self::sm()::who(tr(4)));
var_dump($a?->b::who() . '!');
var_dump($z?->b::who() === null);
var_dump($a?->b::who() instanceof H);
$r = $a?->b::who(); var_dump($r);
var_dump([$a?->b::who(), $z?->b::who()]);
var_dump(match(true) { default => $a?->b::who() });
$f = fn() => $a?->b::who(); var_dump($f());
echo "{$a?->b::who()}\n";
echo <<<X
h {$a?->b::who()} {$z?->b::who(tr(5))}|
X;
echo "\n";
