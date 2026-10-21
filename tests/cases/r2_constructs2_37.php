<?php
eval('echo strtoupper("a"), "\n"; __HALT_' . 'COMPILER(); echo strtoupper("never");');
eval('?>T<?php echo strtoupper("b"), "\n";');
eval('?>' . "\n" . 'U<?= strtoupper("c") ?>' . "\n");
echo "\n";
try { eval('return __COMPILER_HALT_OFFSET__;'); } catch (Error $e) { echo $e->getMessage(), "\n"; }
echo eval('return __FILE__ === __FILE__ . "";') ? 'y' : 'n', "\n";
__halt_compiler();
