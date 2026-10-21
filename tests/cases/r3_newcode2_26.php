<?php
// Top-level alternative-syntax switch with magic-constant, include and eval case labels next to an enum with keyword cases.
$v = __DIR__;
switch ($v):
    case __FILE__:
        echo "file\n";
        break;
    case include __DIR__ . '/fixtures/r3_newcode2_ret.php':
        echo "ret\n";
        break;
    case eval('return __DIR__;'):
        echo "eval-dir\n";
        break;
    default:
        echo "default\n";
endswitch;
enum K: string { case __DIR__ = 'd'; case include = 'i'; case eval = 'e'; case require_once = 'r'; }
echo K::from('d')->name, ' ', K::include->value, ' ', K::tryFrom('r')?->name, "\n";
echo match (true) { $v === __FILE__ => 'f', $v === __DIR__ => 'd', default => 'x' }, "\n";
