<?php
function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$c = 'Orig\Thing';
$n = null;
eval("L(__FILE__); echo '{$c::$p}',
\"\\n\";
");
eval("L(__FILE__); echo '{$c::who()}'
. \"\\n\";");
eval("L(__FILE__); echo '{$n?->x::who()}'
. \"-\\n\";
");
eval(
    "L(__FILE__); echo '{$c::$p}'
    . \"\\n\";" . "
    "
);
eval("L(__FILE__); echo '{$c::$p}"
    . "'. \"\\n\";");
eval(<<<C
L(__FILE__); echo '{$c::$p}', "\\n";
C
);
eval(<<<C
L(__FILE__); echo '{$n?->x::who()}', "-\\n";
C);
