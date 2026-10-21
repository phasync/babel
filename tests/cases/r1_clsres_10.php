<?php
namespace hooks;
use Orig\Thing;
use PDO;
class H {
    public Thing $a { set(Thing $v) { $this->a = $v; } get => $this->a; }
    public private(set) ?Thing $b = null;
    public function __construct() { $this->a = new Thing; }
}
$h = new H;
echo get_class($h->a), "\n";
echo (new \ReflectionProperty(H::class, 'a'))->getHook(\PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
echo (new \ReflectionProperty(H::class, 'b'))->getType(), "\n";
try { $h->a = new \stdClass; } catch (\TypeError $e) { echo "TE\n"; }
try { $h->a = unserialize('O:10:"Orig\Thing":0:{}'); } catch (\TypeError $e) { echo "TE\n"; }
