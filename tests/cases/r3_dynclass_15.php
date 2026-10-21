<?php
// new with every dynamic class expression
class H { public static $c = 'Orig\Thing'; public $p = 'Orig\Thing'; public static function f() { return 'Orig\Thing'; } }
$c = 'Orig\Thing';
$n = 'c';
$h = new H();
$a = ['k' => 'Orig\Thing'];
$z = null;
echo get_class(new $c), "\n";
echo get_class(new $c()), "\n";
echo get_class(new $$n), "\n";
echo get_class(new ${'c'}), "\n";
echo get_class(new $h->p), "\n";
echo get_class(new $h->p()), "\n";
echo get_class(new $a['k']), "\n";
echo get_class(new H::$c), "\n";
echo get_class(new $h::$c), "\n";
echo get_class(new ('Orig' . '\Thing')), "\n";
echo get_class(new (H::f())()), "\n";
echo get_class(new ($z ?? $c)()), "\n";
echo get_class(new ($z ?: $c)), "\n";
echo get_class(new (new Orig\Thing)), "\n";
echo get_class(new class extends Orig\Base {}) === 'Repl\Base' ? 'no' : 'anon', "\n";
echo (new class extends Orig\Base {})->name(), "\n";
echo get_parent_class(new class(new $c) { public function __construct(public $t) {} } ) ?: 'none', "\n";
echo get_class((new class($c) { public function __construct(public $t) {} })->t::who() ? new $c : null), "\n";
