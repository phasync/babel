<?php
// Keyword-named properties and methods in computed class and callee chains.
$o = new class {
    public $class = 'Orig\Thing';
    public $list = ['k' => 'strtoupper'];
    public $fn = 'fopen';
    public static $static = 'Orig\Thing';
    public function new() { return 'Orig\Thing'; }
    public static function match() { return 'strtoupper'; }
};
echo $o->class::who(), ' ', $o->list['k']('a'), ' ', ($o->fn)('b'), ' ', $o::$static::who(), "\n";
echo $o->new()::who(), ' ', $o::match()('c'), ' ', "{$o->class::who()}", ' ', $o?->class::X, "\n";
echo <<<E
  {$o->class::who()} {$o->list['k']('d')} {$o::$static::$p}
  E, "\n";
$x = new $o->class;
$y = new ($o->new());
echo get_class($x), ' ', get_class($y), ' ', $x instanceof $o->class ? 'i' : '-', "\n";
