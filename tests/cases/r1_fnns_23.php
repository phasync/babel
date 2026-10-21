<?php
namespace hk2;
use Orig\Thing;
class P {
    public ?Thing $t = null {
        set(?Thing $v) { $this->t = $v; }
    }
}
$p = new P;
try { $p->t = unserialize('O:10:"Orig\Thing":0:{}'); echo "accepted orig\n"; } catch (\TypeError $e) { echo "TypeError\n"; }
$p->t = new \Repl\Thing; echo "accepted repl\n";
echo (new \ReflectionProperty(P::class, 't'))->getType(), "\n";
echo (new \ReflectionProperty(P::class, 't'))->getHook(\PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
