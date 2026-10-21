<?php
// A keyword-named class constant or enum constant in front of '::' holds a class name computed
// at run time (A::LIST::who(), $o::NEW::X): the second '::' is dynamic and must be mapped.
class H {
    const LIST = 'Orig\Thing';
    const NEW = 'Orig\Thing';
    public static function default() { return 'Orig\Thing'; }
    public static function list() { return 'Orig\Thing'; }
    public function print() { return 'Orig\Thing'; }
}
enum E: string { case Default = 'd'; const Orig = 'Orig\Thing'; const FOREACH = 'Orig\Thing'; }
$o = new H;
echo H::LIST::who(), ' ', $o::NEW::X, ' ', E::FOREACH::$p, "\n";
