<?php
// PHP 8.4/8.5 set-visibility modifiers in every member kind: properties, static, readonly, promoted, traits, hooks, DNF types.
namespace App;
use Orig\Thing;
use Orig\Contract;
trait Tt { public private(set) ?Thing $tt = null; protected(set) \Orig\Base|null $tb = null; }
abstract class P {
    private(set) Thing $a;
    public protected(set) static ?Thing $s = null;
    final public(set) Thing|int $f = 1;
    protected(set) readonly Thing $r;
    public private(set) (Contract&Thing)|\Orig\Base|null $d = null;
    public private(set) Thing $h { get => $this->h; set(Thing $v) { $this->h = $v; } }
    abstract public protected(set) Thing $ab { get; set; }
    use Tt;
    public function __construct(
        public private(set) Thing $pa,
        protected(set) readonly Thing|\Orig\Base $pb,
        private(set) ?Thing $pc = new Thing { set(?Thing $v) => $v; },
    ) { $this->a = $pa; $this->r = $pa; $this->h = $pa; self::$s = $pa; $this->tt = $pa; }
}
class Q extends P { public protected(set) Thing $ab; }
$q = new Q(new \Repl\Thing, new \Repl\Base);
foreach (['a', 'f', 'r', 'd', 'h', 'ab', 'pa', 'pb', 'pc', 'tt', 'tb'] as $p) {
    echo $p, ':', (new \ReflectionProperty(Q::class, $p))->getType(), ' ';
}
echo "\n", (new \ReflectionProperty(P::class, 's'))->getType(), ' ', \get_class(P::$s), ' ', \get_class($q->pc), "\n";
