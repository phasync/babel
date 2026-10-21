<?php
// fallback calls inside the arguments of nullsafe chains with static links, before and after the
// namespaced function exists (the calls keep their first choice, the short circuit skips them)
namespace App;
class B { public $b = 'Orig\Thing'; public $self; function c($x) { return 'Orig\Thing'; } function __construct() { $this->self = $this; } }
function t($o) {
    return json_encode([
        $o?->b::who(strtoupper('a')),
        $o?->c(strtoupper('b'))::$p,
        ($o?->self)?->b::who(strtoupper(...)('c')),
        $o?->self?->self->b::$p ?? strtoupper('d'),
        strtoupper($o?->b::who()),
        $o?->c(fopen('e'))::who(fn () => fopen('f')),
    ]);
}
echo t(new B), "\n", t(null), "\n";
eval('namespace App; function strtoupper($x) { return "local"; } function fopen($x) { return "lf"; }');
echo t(new B), "\n", t(null), "\n";
