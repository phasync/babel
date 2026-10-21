<?php
// a declaration inside alternative-syntax control flow at the top level is conditional
namespace App;
if (false):
    function fopen() { return 'local'; }
endif;
echo fopen('x'), "\n";
while (false):
    function strtoupper() { return 'local'; }
endwhile;
echo strtoupper('x'), "\n";
foreach ([] as $v):
    function sleep() { return 'local'; }
endforeach;
echo sleep(1), "\n";
