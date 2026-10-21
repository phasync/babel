<?php
// Nullsafe chains with static access inside heredoc, nowdoc-like "EOT", backtick and double quoted interpolation.
class O { public $c = 'Orig\Thing'; public $n = null; public $o; function __construct() { $this->o = $this; } }
$a = new O; $z = null;
echo <<<EOT
1 {$a?->c::who()}
2 [{$z?->c::who()}]
3 {$a?->o?->c::who()} {$a->o?->c::$p}
4 [{$a?->n?->c::who()}]
EOT;
echo "\n";
echo "5 {$a?->c::who()} [{$z?->c::who()}] {$a?->o->c::$p}\n";
echo `echo 6 {$a?->c::who()}`;
echo <<<"EOT"
  7 {$a?->o?->c::who()}{$a?->c::who()}
  EOT;
echo "\n";
$f = fn() => $a;
echo "8 {$f()?->c::who()}\n";
echo <<<EOT
9 {$f()?->c::who()} {$a->o->o?->c::who()}
EOT;
echo "\n";
