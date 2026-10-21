<?php
// Property hooks after PHP 8.5 closure defaults (with and without return types), attributes holding closures, nowdocs with braces.
namespace App;
use Orig\Thing;
#[\Attribute(\Attribute::TARGET_ALL)] class At { public function __construct(public $c = null) {} }
class C {
    #[At(static function (Thing $t): string { return \get_class($t) . Thing::X; })]
    public \Closure $a = static function (): string { return Thing::who(); } {
        get => $this->a;
        set(\Closure $v) { $this->a = $v; }
    }
    public \Closure $b = static function () { return [new Thing, Thing::X]; } { get { return $this->b; } }
    public string $n = <<<'EOT'
      { not a hook } {$x}
      EOT { get => $this->n . Thing::X; }
    public function __construct(
        #[At(static function () { return Thing::class; })]
        public \Closure $p = static function (Thing ...$t): string { return Thing::who(); } { get => $this->p; },
        public ?Thing $q = null { set(?Thing $v) { $this->q = $v ?? new Thing; } },
    ) {}
}
$c = new C;
echo ($c->a)(), ' ', \json_encode(\array_map('get_class', [($c->b)()[0]])), ($c->b)()[1], ' ', $c->n, "\n";
echo ($c->p)(), ' ', (new \ReflectionProperty(C::class, 'a'))->getAttributes()[0]->newInstance()->c->__invoke(new \Repl\Thing), "\n";
echo ((new \ReflectionParameter([C::class, '__construct'], 'p'))->getAttributes()[0]->newInstance()->c)(), "\n";
$c->q = null;
echo \get_class($c->q), ' ', (new \ReflectionProperty(C::class, 'q'))->getType(), ' ', (new \ReflectionFunction($c->p))->getParameters()[0]->getType(), "\n";
