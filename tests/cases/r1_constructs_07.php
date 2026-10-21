<?php
$name = 'n';
eval(<<<'PHP'
    echo fopen("heredoc"), "\n";
    echo $name, "\n";
    PHP);
$v = eval(<<<PHP
    return "\$name=$name" . sleep(1);
    PHP
);
echo $v, "\n";
echo eval("return 1;" . 'echo fopen(1);') . "\n";
$p = 'ec'; $q = 'ho 1;';
eval('ec' . 'ho sleep(1);'); echo "\n";
eval($p . $q); echo "\n";
echo (true ? eval('return fopen(1);') : eval('return 2;')), "\n";
echo "x" . eval('return sleep(1);') . "y" . eval('return usleep(1);'), "\n";
