<?php
$a = eval('return __FILE__;');
echo $a, "\n";
echo eval('return eval(\'return __FILE__;\');'), "\n";
echo eval('return eval(
"return eval(\'return __FILE__ . __LINE__;\');"
);'), "\n";
echo eval('return __LINE__ . "|" . __DIR__ . "|" . __FUNCTION__ . "|" . __NAMESPACE__;'), "\n";
function f() { return eval('return __FUNCTION__ . "|" . __FILE__;'); }
echo f(), "\n";
