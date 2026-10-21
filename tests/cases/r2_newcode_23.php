<?php
// Enums, interfaces and traits declared inside functions and closures; class keyword oddities.
function decl() {
    if (!enum_exists('E', false)) {
        enum E: string implements \Orig\Contract {
            case include = 'i';
            case __FILE__ = 'f';
            const Orig\Thing|null T = null;
            public function f(\Orig\Thing $t): string { return get_class($t) . self::class . static::include->value; }
        }
        interface J extends \Orig\Contract { public function j(\Orig\Base $b): \Orig\Base; }
        trait K { public function k(\Orig\Base $b) { return get_class($b) . strtoupper('x'); } }
    }
}
decl();
$f = function () { return new class implements J { use K; public function j(\Orig\Base $b): \Orig\Base { return $b; } }; };
$o = $f();
echo E::include->f(new \Orig\Thing), ' ', E::__FILE__->value, ' ', $o->k(new \Orig\Base), ' ', get_class($o->j(new \Orig\Base)), "\n";
echo implode(',', class_implements('E')), ' ', (new ReflectionClassConstant('E', 'T'))->getType(), ' ', basename(__FILE__), "\n";
