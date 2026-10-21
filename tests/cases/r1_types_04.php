<?php
use Orig\Thing;
use Orig\Base;

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }

class Hooked {
    public ?Thing $a = null {
        set(?Thing $v) { $this->a = $v; }
    }
    public Thing|Base|null $b = null {
        get => $this->b;
        set(Thing|Base|null $value) => $value;
    }
    public private(set) ?Thing $c = null;
    public protected(set) Thing|Base|null $d = null {
        set(Base|Thing|null $x) { $this->d = $x; }
    }
}
$h = new Hooked;
$h->a = new Repl\Thing;
echo get_class($h->a), "\n";
try { $h->a = orig('Orig\Thing'); echo "hook a accepted Orig\n"; } catch (TypeError $e) { echo "hook a rejects\n"; }
$h->b = new Repl\Base;
try { $h->b = orig('Orig\Base'); echo "hook b accepted Orig\n"; } catch (TypeError $e) { echo "hook b rejects\n"; }
$rp = new ReflectionProperty(Hooked::class, 'a');
echo $rp->getType(), ' ', $rp->getHook(PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
$rp = new ReflectionProperty(Hooked::class, 'b');
echo $rp->getType(), ' ', $rp->getHook(PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
$rp = new ReflectionProperty(Hooked::class, 'd');
echo $rp->getType(), ' ', $rp->getHook(PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
echo new ReflectionProperty(Hooked::class, 'c')->getType(), "\n";
