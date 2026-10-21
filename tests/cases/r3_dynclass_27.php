<?php
// Whitespace, comments and line breaks inside dynamic class expressions keep line numbers
$c = 'Orig\Thing';
$o = new stdClass();
$o->c = $c;
echo $c /* a */ :: /* b */ who(), "\n";
echo $o
    ->c
    ::who(), "\n";
echo ( // comment
    $c
)::X, "\n";
echo $o -> c :: $p, "\n";
echo __LINE__, "\n";
try { $o->c
    ::nope(); } catch (Error $e) { echo $e->getLine(), ' ', $e->getMessage(), "\n"; }
