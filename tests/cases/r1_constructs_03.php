<?php
$x = eval('return eval(\'return eval("return fopen(1) . sleep(2);");\');');
echo $x, "\n";
eval('eval("echo __FILE__, \"\\n\";");');
eval('
eval("
echo __FILE__, \"\\n\";
");');
