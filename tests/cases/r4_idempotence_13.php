<?php
// `new $c?->m` is a class name expression with a nullsafe link: it does not short-circuit the `::` after it.
class P { public static $p = 'P::$p'; public $m = 'P'; static function m() { return 'P::m'; } }
foreach ([new P, null] as $c) {
    try { $r = (new $c?->m())::$p; var_dump($r); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
    try { var_dump((new $c?->m)::m()); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
}
