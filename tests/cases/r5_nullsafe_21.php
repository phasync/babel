<?php
// Nullsafe chains with static access in heredocs and nested double quoted strings (heredoc interpolation through $GLOBALS closures).
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $self; public $nul;
  public function __construct() { $this->self = $this; }
  public static function id($x) { return $x; } }
$a = new H; $z = null;
echo <<<E
3 {$a?->self::id('Orig\Thing')::who()}
4 {$a?->self?->self::id($a)?->b::who()}
6 [{$z?->self::id(tr(1))?->b::who(tr(2))}]
7 {$a?->self::id("x{$a?->b::who()}")}
E;
echo "\n";
echo "9 {$a?->self::id("{$z?->b::who(tr(3))}")}\n";
