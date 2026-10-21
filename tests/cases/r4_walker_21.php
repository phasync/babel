<?php
// A parenthesised nullsafe class expression right after a keyword with no space: the wrap that opens there is empty.
$o = new class { public $c = 'Orig\Thing'; };
echo($o?->c)::who(), "\n";
print($o?->c)::who();
echo "\n";
