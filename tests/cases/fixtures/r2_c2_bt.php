<?php function L($t, $f) { echo $t, ":", basename(preg_replace("~\((\d+)\) : eval.*$~", ":$1", $f)), "\n"; }
eval(`echo 'L("b", __FILE__);'
`
);
eval(`
echo 'L("c", __FILE__);'`);
