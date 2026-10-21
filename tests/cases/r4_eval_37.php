<?php
var_dump(class_exists("Orig\\Thing\400", false));
var_dump(eval('return class_exists("Orig\\\\Thing\400", false);'));
try { var_dump(eval('return class_exists("\u{110000}");')); } catch (ParseError $e) { echo get_class($e), ': ', $e->getMessage(), ' @', basename($e->getFile()), ':', $e->getLine(), "\n"; }
try { var_dump(eval('return "\u{zz}"("x");')); } catch (ParseError $e) { echo get_class($e), ': ', $e->getMessage(), ' @', basename($e->getFile()), ':', $e->getLine(), "\n"; }
