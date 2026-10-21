<?php
if (!isset($depth)) { $depth = 0; }
$depth++;
echo "depth $depth ", strtoupper('x'), "\n";
var_dump(include_once __FILE__);
var_dump(require_once __DIR__ . '/' . basename(__FILE__));
if ($depth < 2) { include __FILE__; }
echo "end $depth\n";
