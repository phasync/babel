<?php
// Two nullsafe links before a static call whose result is called: the call is not short-circuited.
class Q { static function m() { return fn($x = 0) => "called($x)"; } }
class R { function m() { return 'Q'; } }
class O { public $p; function __construct() { $this->p = new R; } }
function se() { echo "SIDE "; return 1; }
foreach ([new O, null] as $o) {
    try { var_dump($o?->p?->m()::m()(se())); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
    try { var_dump(call_user_func($o?->p?->m()::m(), se())); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
}
