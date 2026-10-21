<?php
namespace App;
function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$a = [[1, 'stdClass']];
eval('\App\L(__FILE__);' . is_a(...$a
[
0
]
));
eval('\App\L(__FILE__);' . \is_a(...$a
[
0
]
));
eval('\App\L(__FILE__);' . class_exists($a[0]
[
1
], false
));
eval('\App\L(__FILE__);' . substr(...[
'x', 0, 0
]
));
