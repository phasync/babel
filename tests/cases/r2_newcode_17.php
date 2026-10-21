<?php
// Property hooks: defaults, attributes, modifiers, by-ref get, set parameter types, abstract and interface hooks.
interface I { public Orig\Thing $t { get; } }
abstract class A implements I { abstract public Orig\Base|PDO $b { get; set; } }
class C extends A {
    public array $arr = ['a' => [1, 2], 'b' => PHP_EOL] { get => array_keys($this->arr); }
    public Orig\Thing $t { #[Orig\Attr(1)] get => new Orig\Thing; }
    public Orig\Base|PDO $b { final set(Orig\Base|PDO $v) { $this->b = $v; } get => $this->b; }
    public array $s = [] { &get { return $this->s; } }
    public string $u = "x" { set(string $value) { $this->u = strtoupper($value); } }
    public function __construct() { $this->b = new Orig\Base; }
}
$c = new C;
echo implode(',', $c->arr), ' ', get_class($c->t), ' ', get_class($c->b), "\n";
$c->u = "y"; $c->s[] = 1;
echo $c->u, count($c->s), "\n";
$rp = new ReflectionProperty(C::class, 'b');
echo $rp->getHook(PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
echo $rp->getHook(PropertyHookType::Set)->getName(), (new ReflectionProperty(C::class, "t"))->getHook(PropertyHookType::Get)->getAttributes()[0]->getName(), "\n";
