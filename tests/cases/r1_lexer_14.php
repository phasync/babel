<?php
namespace A;
use Orig\Thing;
use Orig\Contract;
class H {
    public string $name { get => strtoupper($this->name); set(string $v) { $this->name = fopen('x') . $v; } }
    public ?Thing $t { set(Thing|null $value) { echo get_class($value), "\n"; $this->t = $value; } get => $this->t; }
    public private(set) Thing $pv;
    public protected(set) ?Contract $pc = null;
    public function __construct() { $this->pv = new Thing; }
}
$h = new H;
$h->name = 'a';
echo $h->name, "\n";
$h->t = new Thing;
$p = (new \ReflectionProperty(H::class, 't'))->getHook(\PropertyHookType::Set);
echo $p->getParameters()[0]->getType(), "\n";
echo (new \ReflectionProperty(H::class, 't'))->getType(), "\n";
echo get_class($h->pv), "\n";
try { $h->pv = new Thing; } catch (\Error $e) { echo $e->getMessage(), "\n"; }
