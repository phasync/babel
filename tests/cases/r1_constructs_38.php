<?php
// __COMPILER_HALT_OFFSET__ is only defined for the file that has __halt_compiler(); eval'd code must not see it
try { eval('echo __COMPILER_HALT_OFFSET__;'); } catch (Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
echo __COMPILER_HALT_OFFSET__ > 0 ? "main ok\n" : "bad\n";
try { echo eval('return fopen(1) . (defined("__COMPILER_HALT_OFFSET__") ? "def" : "undef");'), "\n"; } catch (Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { echo include __DIR__ . '/fixtures/r1_nohalt.php'; } catch (Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
echo "\n";
__halt_compiler();
fopen
