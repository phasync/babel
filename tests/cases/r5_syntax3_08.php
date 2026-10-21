<?php
// property hooks with arrow bodies on promoted parameters: bodies are code, the default and the hook parameter types are not
namespace N;
use Orig\Thing;
class P {
    public function __construct(
        public string $cls = 'Orig\Thing',
        public string $a = Thing::X {
            get => strtoupper($this->a) . fopen('x');
            set(Thing|string $v) => $v . (new Thing)::X . $this->cls::who();
        },
        public $b = [Thing::class, 'who'] { get => ($this->b)() . \strlen(...)('ab'); },
    ) {}
}
$p = new P(cls: 'Orig\Thing');
echo $p->a, "\n";
$p->a = 'z';
echo $p->a, "\n";
echo $p->b, "\n";
echo (new \ReflectionProperty(P::class, 'a'))->getHook(\PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
