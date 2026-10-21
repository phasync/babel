<?php
namespace A;
$a = 1;
echo eval('return fopen("e1") . __LINE__ . $a;'), "\n";
$e5 = eval(<<<'CODE'
return [
  fopen('multi'),
  __LINE__,
  basename(__FILE__) . '|' . __DIR__ === dirname(__FILE__),
];
CODE
);
echo $e5[1], "\n";
try { eval("\n\n throw new \\Exception(fopen('x'));"); } catch (\Exception $e) { echo $e->getMessage(), ':', $e->getLine(), "\n"; }
echo eval('return __FILE__;') === eval('return __FILE__;') ? "same\n" : "diff\n";
echo str_contains(eval('return __FILE__;'), "eval()'d code") ? "evalfile\n" : "notevalfile\n";
echo eval('namespace B; return __NAMESPACE__ . fopen("n");'), "\n";
echo eval('?>text fopen() <?php return sleep(1);'), "\n";
echo EVAL('return usleep(1);'), "\n";
$s = 'eval("return 1;")';
echo $s, "\n";
echo eval('return eval("return fopen(\'inner\') . __LINE__;");'), "\n";
