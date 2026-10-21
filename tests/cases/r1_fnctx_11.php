<?php
#[Attribute(Attribute::TARGET_ALL | Attribute::IS_REPEATABLE)]
class A { public function __construct(public mixed $v = null, public mixed $w = null) {} }
#[A(fopen(...), w: [sleep(...), strtoupper(...)])]
#[A(new ArrayObject([usleep(...)]))]
function target() {}
$attrs = (new ReflectionFunction('target'))->getAttributes();
$x = $attrs[0]->getArguments();
echo $x[0](), ' ', $x['w'][0](), ' ', $x['w'][1](), "\n";
echo $attrs[1]->newInstance()->v->getArrayCopy()[0](), "\n";
class W {
    public function __construct(
        #[A(fopen(...))] public string $p = 'd',
    ) {}
    #[A(v: curl_exec(...))]
    public const C = 1;
}
echo ((new ReflectionClass('W'))->getConstructor()->getParameters()[0]->getAttributes()[0]->getArguments()[0])(), "\n";
echo (new ReflectionClassConstant('W', 'C'))->getAttributes()[0]->getArguments()['v'](), "\n";
