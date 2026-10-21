<?php
// a computed callee in parentheses: ternary, match, concatenation, null coalescing
$fast = true;
echo ($fast ? 'usleep' : 'sleep')(1), "\n";
echo (match (true) { default => 'fopen' })('x'), "\n";
echo ('fop' . 'en')('x'), "\n";
$cfg = [];
echo ($cfg['cb'] ?? 'strtoupper')('x'), "\n";
