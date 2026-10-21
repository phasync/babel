<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
eval('L("a", __FILE__); ' .
 1
 . ';'

);
eval('L("b", __FILE__); ' .
 1.5
 . ';'

);
eval('L("c", __FILE__); ' .
 __LINE__
 . ';'

);
eval('L("d", __FILE__); ' .
 -1
 . ';'

);
eval('L("e", __FILE__); ' .
 <<<'X'
 1;
 X
 . ''

);
eval('L("f", __FILE__); ' .
 0x1F
 . ';'

);
eval('L("g", __FILE__); ' .
 PHP_INT_SIZE
 . ';'

);
eval('L("h", __FILE__); ' .
 "1;"
 . ''

);
eval('L("i", __FILE__); ' .
 "1\x3b"
 . ''

);
