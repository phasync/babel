<?php
// Callee that is a static property of a parenthesised nullsafe class expression: translating the
// translation again must not wrap the callee a second time.
class K { public static $f = ['k' => 'strtoupper']; }
$o = new class { public $c = 'K'; };
echo ($o?->c)::$f['k']('ab'), "\n";
