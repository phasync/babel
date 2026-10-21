<?php
// literal string calls are always global; namespace\ calls never fall back; reserved words in namespace names
namespace App\List\Fn;
function fopen($x) { return 'ns:fopen'; }
echo 'fopen'('a'), ' ', ('fopen')('b'), ' ', '\fopen'('c'), ' ', namespace\fopen('d'), ' ', fopen('e'), "\n";
echo strtoupper('f'), ' ', __NAMESPACE__, "\n";
eval('namespace App\List\Fn; function strtoupper($s) { return "ns:strtoupper"; }');
echo strtoupper('g'), ' ', \call_user_func('strtoupper', 'h'), ' ', \call_user_func(__NAMESPACE__ . '\strtoupper', 'i'), "\n";
