<?php
// A null class name that does NOT come from a short-circuited nullsafe chain must still throw
class O { public $n = null; public function nul() { return null; } }
function id($v) { return $v; }
$o = new O();
$z = null;
foreach ([
    fn () => $o?->nul()::who(),
    fn () => $o?->n::who(),
    fn () => id($z?->x)::who(),
    fn () => [$z?->x][0]::who(),
] as $k => $f) {
    try {
        var_dump($f());
    } catch (Error $e) {
        echo $k, ' ', get_class($e), ': ', $e->getMessage(), "\n";
    }
}
