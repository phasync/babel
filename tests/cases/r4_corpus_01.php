<?php
// r4 (probe): a nullsafe chain before '::' that continues after the static member with another '::' or with a
// further nullsafe chain before '::' ($a?->b::make()?->cls::who(), $a?->b::name()::who(), $a?->b::$next::$p)
// is translated with unbalanced parentheses: the output fails php -l.
class Box { public $b = 'Factory'; public $cls = 'Orig\Thing'; }
class Factory
{
    public static $next = 'Orig\Thing';
    public static function make() { return new Box; }
    public static function name() { return 'Orig\Thing'; }
}
$a = new Box;
$n = null;
echo $a?->b::make()?->cls::who(), "\n";
echo $a?->b::make()?->cls::$p, "\n";
var_dump($n?->b::make()?->cls::who());
echo $a?->b::name()::who(), "\n";
echo $a?->b::$next::$p, "\n";
var_dump($n?->b::name()::who(), $n?->b::$next::$p);
