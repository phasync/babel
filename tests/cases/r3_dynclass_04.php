<?php
// A parenthesised / array class expression at the start of a statement after a block
$c = 'Orig\Thing';
if (true) {
}
($c)::$p = 'a';
echo \Repl\Thing::$p, "\n";
{
}
($c . '')::$p = 'b';
echo \Repl\Thing::$p, "\n";
function f() {}
['Orig\Thing'][0]::$p = 'c';
echo \Repl\Thing::$p, "\n";
