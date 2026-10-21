<?php
// Calling the result of a static call at the end of a chain with two nullsafe links: the callee is the
// whole `$o?->self()?->c::fs()`, the guard of the second link must not swallow the call's arguments.
class K { public $c = 'K'; static function fs() { return 'strtoupper'; } function self() { return $this; } }
$o = new K;
echo $o?->self()?->c::fs()('ab'), "\n";
echo $o?->c::fs()('cd'), "\n";
