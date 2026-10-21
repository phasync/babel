<?php
// Nullsafe chains with static access in double quoted strings, heredocs, b"" strings, with side effects in skipped arguments.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $self; public $nul = null; public $fn = 'Orig\Thing::who';
  public function __construct() { $this->self = $this; }
  public static function id($x) { return $x; } }
$a = new H; $z = null;
echo "A {$a?->b::who()} B {$z?->b::who(tr(1))} C {$a?->self?->b::who(tr(2))}\n";
echo "F {$a?->self?->b::$p} G\n";
echo <<<EOT
  H {$a?->b::who()} I {$z?->self::id(tr(3))} J {$a?->self::id(tr(4))}
  K {$a?->b::$p}
  EOT;
echo "\n";
echo <<<'EOT'
 {$a?->b::who()}
EOT;
echo "\n";
echo "L " . "{$a?->self::id("x{$a?->b::who()}y")}" . "\n";
printf("%s %s\n", "{$z?->b::who()}", "{$a?->self::id(tr(5))}");
echo "M {$a?->b::who()}{$a?->b::who()}\n";
echo b"N {$a?->b::who()}\n";
