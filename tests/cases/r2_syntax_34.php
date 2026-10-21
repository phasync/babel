<?php
// PHP 8.5 attributes on constants, #[\Override] on properties, final promoted params, __PROPERTY__
namespace s34;
use Orig\{Thing, Attr};
#[Attr(Thing::class)]
const K = Thing::X;
#[\Deprecated("old"), Attr(new Thing)]
const L = 1;
class P { public ?Thing $t = null; }
final class C extends P {
    #[\Override]
    public ?Thing $t = null { get => $this->t ?? new Thing; }
    public string $name { get => __PROPERTY__ . ':' . strtoupper('x'); }
    public function __construct(final public Thing $f = new Thing, final protected(set) ?Thing $g = null) {}
}
$c = new C;
echo K, ' ', $c->t::who(), ' ', $c->name, ' ', $c->f::who(), "\n";
$r = new \ReflectionConstant('s34\K');
echo $r->getAttributes()[0]->getName(), ' ', $r->getAttributes()[0]->getArguments()[0], "\n";
echo get_class((new \ReflectionConstant('s34\L'))->getAttributes()[1]->getArguments()[0]), "\n";
