<?php
use Orig\Thing;
use Orig\Base;

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }

class Promo {
    public function __construct(
        public Thing $a {
            set(Thing $v) { $this->a = $v; }
        },
        public ?Base $b = null {
            set(?Base $v) => $v;
        },
    ) {}
}
abstract class Abs {
    abstract public Thing|Base|null $x { set(Thing|Base|null $v); }
}
$p = new Promo(new Repl\Thing);
echo get_class($p->a), "\n";
foreach (['a', 'b'] as $n) {
    $rp = new ReflectionProperty(Promo::class, $n);
    echo $n, ': ', $rp->getType(), ' / ', $rp->getHook(PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
}
echo (new ReflectionProperty(Abs::class, 'x'))->getHook(PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
try { $p->a = orig('Orig\Thing'); echo "accepted\n"; } catch (TypeError) { echo "rejects\n"; }
