<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
$c = 'L("a", __FILE__);';
eval(@
 $c
);
eval($c
 instanceof
 stdClass ? '' : $c
);
eval(isset(
 $c
) ? $c : ''
);
eval(eval(
 'return \'L("d", __FILE__);\';'
 )
);
eval(
 "
$c"
);
eval(<<<X
 //x
 {$c}
 X
);
eval(<<<X
 $c
 //x
 X
);
eval(PHP_EOL
 . $c
);
eval($c
 . PHP_EOL
);
eval('' .
 PHP_EOL . $c
);
eval(PHP_EOL .
 'L("k", __FILE__);'
 );
