<?php
use Orig\Thing;
use Orig\Base;
use Orig\Attr;

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }

// PHP 8.5: closures are allowed in attribute arguments

#[Attr(static function (Thing $t, Base|null $b = null): Thing|Base { return $t; })]
final class Consts {
    #[Attr(static function (?Base $b, Thing ...$more): Base|Thing|null { return $b; })]
    public function __construct(
        #[Attr(static function (Thing&Orig\Contract $x): ?Thing { return null; })] public $q = null,
    ) {}
}
$sig = function (Closure $c) {
    $rf = new ReflectionFunction($c);
    $s = '';
    foreach ($rf->getParameters() as $p) $s .= $p->getType() . ',';
    return $s . '=>' . $rf->getReturnType();
};
$attr = (new ReflectionClass(Consts::class))->getAttributes()[0]->getArguments()[0];
echo $sig($attr), "\n";
$ctor = new ReflectionMethod(Consts::class, '__construct');
echo $sig($ctor->getAttributes()[0]->getArguments()[0]), "\n";
echo $sig($ctor->getParameters()[0]->getAttributes()[0]->getArguments()[0]), "\n";
try { $attr(orig('Orig\Thing')); echo "accepted\n"; } catch (TypeError) { echo "rejects\n"; }
