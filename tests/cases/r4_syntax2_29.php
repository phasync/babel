<?php
// Property hooks with asymmetric visibility, attributes, final, by-reference get, interfaces and abstract hooks.
namespace App;
use Orig\{Thing, Attr, Contract};

interface HasT { public Thing $t { get; } public Contract|Thing $u { set; } }
abstract class A implements HasT {
    abstract public Thing $t { get; }
    public Contract|Thing $u { set(Contract|Thing $v) { $this->u = $v; } }
}
final class B extends A {
    public protected(set) ?Thing $w = null;
    private array $data = ['k' => 'v'];
    public function __construct(
        public private(set) Thing $p = new Thing { #[Attr] final get => $this->p; },
        protected(set) Thing|\PDO|null $q = null,
    ) { $this->u = new Thing; }
    public Thing $t {
        #[Attr(Thing::class)] get { return fopen('x') === 'HOOK:fopen' ? new Thing : null; }
    }
    public array $ref { &get => $this->data; }
    public string $virt { get => strtoupper('v') . \get_class($this->w ?? new Thing); }
}
$b = new B;
echo get_class($b->t), ' ', get_class($b->u), ' ', get_class($b->p), ' ', $b->virt, "\n";
foreach ([['A', 'u'], ['B', 'w'], ['B', 'p'], ['B', 'q']] as [$c, $p]) {
    echo (new \ReflectionProperty('App\\' . $c, $p))->getType(), ' ';
}
echo "\n", (new \ReflectionProperty(B::class, 't'))->getHook(\PropertyHookType::Get)->getAttributes()[0]->getArguments()[0], "\n";
$r = &$b->ref; $r['k'] = 'changed'; echo $b->ref['k'], "\n";
