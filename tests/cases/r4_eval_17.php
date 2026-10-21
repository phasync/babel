<?php
eval('?>A<?php echo "B"; ?>C<?= fopen("x") ?>D' . "\n");
echo "|\n";
eval('echo 1; ?>' . "\n" . 'E<?php echo strtoupper("x");');
echo "|\n";
eval('?>');
eval('');
eval(' ');
eval('?><?php echo fopen("y"), "\n";');
eval("?>\n<?php\necho __LINE__, fopen('z'), \"\\n\";");
