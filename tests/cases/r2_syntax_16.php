<?php
// goto with labels named like mapped functions/classes, out of loops; declare blocks with braces
namespace s16;
$i = 0;
fopen:
$i++;
foreach ([1, 2] as $x) {
    while (true) {
        if ($i < 3) goto fopen;
        goto Thing;
    }
}
Thing:
echo $i, ' ', fopen('x'), "\n";
declare(ticks=1) {
    echo strtoupper('a'), ' ', \Orig\Thing::who(), "\n";
    function inside(\Orig\Thing $t): string { return $t::who(); }
}
echo inside(new \Orig\Thing), "\n";
declare(ticks=1):
    echo sleep(1), "\n";
enddeclare;
