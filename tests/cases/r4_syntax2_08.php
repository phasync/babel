<?php
namespace App;
use Orig\Thing;
use Orig\Attr;

class P {
    public const ?Thing NONE = null;
    const PDO = 'const-PDO';
    const Thing|\PDO|null BOTH = null, Thing = null;
    public string $a = 'x' {
        get => strtoupper($this->a) . (function () { return fopen('h'); })();
        set(string $value) {
            $this->a = (static fn (?Thing $t = null) => $value . '|' . sleep(1))();
        }
    }
    public $b {
        get { $c = fn () => \Orig\Thing::who(); return $c(); }
    }
    public \Closure $k = static function (?Thing $t = null): string { return usleep(1) . '/' . Thing::class; };
    public function __construct(
        #[Attr(static function () { return fopen('attr'); })]
        public Thing|\PDO|null $p = null {
            set(Thing|\PDO|null $v) { $this->p = $v; }
            get => $this->p;
        },
    ) {}
}
$o = new P();
$o->a = 'q';
echo $o->a, "\n", $o->b, "\n", ($o->k)(), "\n", P::PDO, ' ', var_export(P::Thing, true), "\n";
$o->p = new Thing();
echo get_class($o->p), "\n";
$r = new \ReflectionProperty(P::class, 'p');
$at = $r->getAttributes()[0];
echo $at->getName(), ' ', ($at->newInstance()->v)(), "\n";
echo (string) (new \ReflectionClassConstant(P::class, 'BOTH'))->getType(), "\n";
echo (string) (new \ReflectionClassConstant(P::class, 'NONE'))->getType(), "\n";
