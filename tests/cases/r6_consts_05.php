<?php
// Constants: member names (->X, ::X) are never touched -- they are not constant fetches at all --
// and constant()/defined() are not specially handled: they keep reading the real PHP_SAPI, which
// differs from a bare (rewritten) usage elsewhere in the same file.
class M {
    const PHP_SAPI = 'member-const';
    public $PHP_SAPI = 'member-prop';
}
$o = new M();
echo $o->PHP_SAPI, "\n";
echo M::PHP_SAPI, "\n";
echo PHP_SAPI, "\n";
echo constant('PHP_SAPI'), "\n";
echo defined('PHP_SAPI') ? 'defined' : 'undefined', "\n";
