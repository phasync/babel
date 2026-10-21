<?php
function t($c) { try { eval($c); } catch (\ParseError $e) { echo get_class($e), ': ', $e->getMessage(), ' @', basename($e->getFile()), ':', $e->getLine(), "\n"; } }
t("\n\n1 +;");
t('$x = 1 $y = 2;');
t('echo "a" "b";');
t('<?php echo 1;');
t('function () {');
t("/* unterminated");
t('echo 1; ?><?php echo 2 3;');
t('$f() $g();');
