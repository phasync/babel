<?php
static $depth = 0;
var_dump(include_once __FILE__);
var_dump(require_once __DIR__ . '/' . basename(__FILE__));
global $n;
$n = ($n ?? 0) + 1;
if ($n < 3) {
    echo "run $n ", fopen('a'), "\n";
    include __FILE__;
    echo "back $n\n";
}
