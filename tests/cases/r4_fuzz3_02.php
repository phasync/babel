<?php
namespace NA;
// eval'd code is compiled anew on every eval: its call sites start with an empty fallback cache
for ($i = 0; $i < 2; $i++) {
    echo eval('namespace NA; return strtoupper("a");'), "\n";
    if ($i === 0) { function strtoupper($x) { return 'NA:' . $x; } }
}
