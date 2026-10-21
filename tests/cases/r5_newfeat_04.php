<?php
// Anonymous classes (extends/implements, ctor args, readonly, attributes, nested) as chain bases of computed callees and classes.
namespace N;
interface I {}
abstract class P { public $cls = 'Orig\Thing'; }
echo new class extends P implements I { function m() { return 'strtoupper'; } }->m()('a'), "\n";
echo new class(5) extends P implements I, \Countable { function __construct(public $n) {} function count(): int { return $this->n; } function __invoke() { return 'strtoupper'; } }()('b'), "\n";
echo new readonly class { function __invoke() { return 'Orig\Thing::who'; } }()(), "\n";
echo new #[\Orig\Attr] class { function __invoke() { return ['Orig\Thing', 'who']; } }()(), "\n";
echo new #[\Orig\Attr(1)] readonly class { public string $c; function __construct() { $this->c = 'Orig\Thing'; } }->c::who(), "\n";
echo new class { public $p; function __construct() { $this->p = new class { function f() { return 'strtoupper'; } }; } }->p->f()('c'), "\n";
echo new class { public $c = 'Orig\Thing'; }->c::$p, "\n";
echo (new class { public $c = 'Orig\Thing'; })->c::who(), "\n";
echo (new class { const C = 'strtoupper'; }::C)('d'), "\n";
echo (new class { public static $f = 'strtoupper'; }::$f)('e'), "\n";
echo new class { public $a = ['k' => 'strtoupper']; }->a['k']('f'), "\n";
$o = new class(new class { function g() { return 'strtoupper'; } }) { function __construct(public $in) {} };
echo $o->in->g()('g'), "\n";
echo new class { function __invoke() { return new class { function __invoke() { return 'strtoupper'; } }; } }()()('h'), "\n";
echo new class extends \Orig\Base {}->name(), "\n";
echo new class { public ?object $n = null; }?->n?->x ?? 'nul', "\n";
