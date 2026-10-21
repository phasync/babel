<?php
// Anonymous classes with properties, hooks and keyword-named members nested inside hook bodies and promoted hooks.
namespace App;
use Orig\Thing;
class Outer {
    public object $inner {
        get {
            return new class(new Thing) {
                public Thing $t { get => $this->t; set(Thing $v) { $this->t = $v; } }
                const include = Thing::X, __DIR__ = __FILE__;
                public function __construct(Thing $x, public ?Thing $y = null { get => $this->y ?? new Thing; }) { $this->t = $x; }
                public function eval(): string { return \get_class($this->t) . \get_class($this->y) . self::include . \basename(self::__DIR__) . fopen('a', 'r'); }
            };
        }
    }
    public string $after = 'x' { get => $this->after . Thing::X . strtoupper('a'); }
}
$o = new Outer;
echo $o->inner->eval(), ' ', $o->after, "\n";
