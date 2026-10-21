<?php
// Hooks on promoted constructor parameters, with defaults and attributes, and a closure default after them.
class C {
    public function __construct(
        public Orig\Thing|null $t = null { set(Orig\Thing|null $v) { $this->t = $v; } },
        #[Orig\Attr] public mixed $list = [1, 2] { get => array_map(fn($x) => $x, $this->list); },
        public string $name = 'n' { set(string $v) { $this->name = strtoupper($v); } },
        public $tail = PHP_INT_SIZE,
    ) {}
    public function f(Orig\Thing $x) { return get_class($x); }
}
$c = new C(new Orig\Thing, [3], 'q');
echo get_class($c->t), ' ', $c->list, ' ', $c->name, ' ', $c->f(new Orig\Thing), "\n";
echo (new ReflectionProperty(C::class, 't'))->getHook(PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
echo (new ReflectionParameter([C::class, '__construct'], 'list'))->getAttributes()[0]->getName(), "\n";
