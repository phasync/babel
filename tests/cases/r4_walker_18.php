<?php
// PHP 8.4: member access on `new class {...}` without parentheses; the '}' ends an anonymous class
// body, which is the base of the chain, not a block.
echo 1, new class { function m() { return 'strtoupper'; } }->m()('a'), "\n";
echo 2, new class { public $p = 'Orig\Thing'; }->p::who(), "\n";
echo 3, new class { public $f = ['strtoupper']; }->f[0]('a'), "\n";
