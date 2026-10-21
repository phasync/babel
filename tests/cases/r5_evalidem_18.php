<?php
// eval'd code that leaves PHP mode, starts with comments / attributes, or is only whitespace
eval('?>A<?php echo fopen("x"); ?>B<?= strtoupper("c") ?>' . "\n");
echo "|\n";
eval("\n?>x\n<?php\necho __LINE__, fopen('y');");
echo "|\n";
eval('?>');
eval('   ');
eval("// c\necho strtoupper('d'), __LINE__;");
echo "|\n";
eval("#[Orig\\Attr(1)]\nfunction r5e18() { return fopen('e'); } echo r5e18(), (new ReflectionFunction('r5e18'))->getAttributes()[0]->getName();");
echo "|\n";
eval("/* x */ declare(strict_types=1); echo strtoupper('f');");
echo "|\n";
eval("?>\n<?php ?>\n<?php echo __LINE__, strtoupper('g');");
echo "\n";
