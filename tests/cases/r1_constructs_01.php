<?php
$a = 'va';
$r = eval('echo fopen("x"), "|", $a, "\n"; return strtoupper("q");');
echo $r, "\n";
eval('$b = sleep(1);');
echo $b, "\n";
echo eval('return __FILE__ . "|" . __LINE__ . "|" . __DIR__;'), "\n";
