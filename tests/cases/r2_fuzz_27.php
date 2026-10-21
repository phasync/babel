<?php
// PHP 8.4/8.5 syntax around mapped names: closures and first-class callables in constant
// expressions, pipe operator, new without parentheses, final promotion, interface properties,
// attributes on global constants, (void) cast, calls inside string interpolation.
namespace App;
class K {
    const F = \strtoupper(...);
    const G = static function (\Orig\Thing $x): string { return strtoupper(\get_class($x)); };
    public function __construct(final public ?\Orig\Thing $t = null) {}
}
interface IP { public \Orig\Thing $p { get; } }
echo (K::F)('a'), ' ', (K::G)(new \Orig\Thing), "\n";
echo (string) (new \ReflectionProperty(K::class, 't'))->getType(), ' ', (string) (new \ReflectionProperty(IP::class, 'p'))->getType(), "\n";
echo 'ab' |> strtoupper(...), ' ', 'ab' |> fopen(...) |> \strtolower(...), "\n";
$id = fn($v) => \is_string($v) ? $v : \gettype($v);
echo "x{$id(strtoupper('ab'))}y {$id(\Orig\Thing::X)}\n";
$arr = ['AB' => 1, 'HOOK:strtoupper' => 2];
echo "x{$arr[strtoupper('ab')]}y\n";
function f(#[\Orig\Attr] ?\Orig\Thing $x = new \Orig\Thing, $y = \Orig\Thing::X) { static $s = new \Orig\Thing; return \get_class($x) . $y . \get_class($s); }
echo f(), "\n";
$o = new #[\Orig\Attr] class(1) extends \Orig\Base implements \Orig\Contract { use \Orig\Tr; public function __construct($a) {} };
echo $o->name(), $o->who(), $o instanceof \Orig\Contract ? ' y' : ' n', "\n";
$x = 'Orig\Thing';
echo new \Orig\Thing()::who(), ' ', new $x()::who(), ' ', \get_class(new $x()), "\n";
echo new class { public function m() { return strtoupper('a'); } }->m(), "\n";
$b = new class { public $c = 'Orig\Base'; };
echo new $b->c()->name(), "\n";
#[\Orig\Attr]
const GC = 1;
echo (new \ReflectionConstant('App\GC'))->getAttributes()[0]->getName(), "\n";
(void) fopen('x', 'r');
echo "ok\n";
