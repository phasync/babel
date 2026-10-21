<?php
use Orig\Thing;
use Orig\Base;
use Orig\Contract;

class Weird {
    /** @var array<int, Thing> generics docblock: Thing|Base stays */
    public (Thing&Contract)|null $dnf = null;
    public static (Base&Contract)|Thing|null $sdnf = null;
    private readonly (Thing&Contract)|string $ro;
    // Thing in line comment
    public const (Thing&Contract)|null DC = null;
    # Thing in hash comment
    public /* Thing */ ?Thing /* Base */ $spaced
        = null;
    public
        Thing
        |
        Base|null
        $multi = null;
    /** @return Thing */
    public function doc(/* Thing */ Thing /* Base */ $x /* ?Thing */): /* Thing */ Thing /* Base */ { return $x; }
    public function str(): string { return 'Thing|Base ' . "Orig\\Thing" . <<<TXT
        Thing $this->spaced instanceof Thing new Thing
        TXT; }
}
foreach (['dnf', 'sdnf', 'ro', 'spaced', 'multi'] as $p) echo $p, '=', (new ReflectionProperty(Weird::class, $p))->getType(), ' ';
echo "\n", (new ReflectionClassConstant(Weird::class, 'DC'))->getType(), "\n";
$m = new ReflectionMethod(Weird::class, 'doc');
echo $m->getParameters()[0]->getType(), ' ', $m->getReturnType(), "\n";
echo $m->getDocComment(), "\n";
echo (new ReflectionProperty(Weird::class, 'dnf'))->getDocComment(), "\n";
echo (new Weird)->str(), "\n";
