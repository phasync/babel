<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$f = fn() => '__FILE__';
eval("L({$f()}
);"
);
