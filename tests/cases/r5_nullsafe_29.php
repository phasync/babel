<?php
// Simple interpolation "$a?->b::who()" takes only $a?->b: the rest is text; {$a?->b}::X likewise.
class H { public $b = 'Orig\Thing'; public $self; public $arr = ['k' => 'v'];
  public function __construct() { $this->self = $this; } public static function id($x) { return $x; } }
$a = new H; $z = null;
echo "1 $a?->b::who() $z?->b::who()\n";
echo "2 {$a?->b}::who()\n";
echo "3 $a?->arr[k]::who()\n";
echo <<<E
4 $a?->b::who() {$a?->self?->b}::X
E;
echo "\n", '5 $a?->b::who()', "\n";
echo "6 {$a?->self->self?->b::who()}{$a?->self::id('x')}\n";
