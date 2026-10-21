<?php
function t($c) { try { var_dump(eval($c)); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; } }
t('echo 1; __halt_compiler(); junk ) (');
t('return __COMPILER_HALT_OFFSET__;');
echo "end\n";
