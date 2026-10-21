<?php
// deep eval nesting built at run time: every level calls a mapped function and reports __FILE__
$code = 'return "core:" . fopen(1) . "|" . preg_replace("~^.*/~", "", __FILE__);';
for ($i = 1; $i <= 8; $i++) {
    $code = "\$v$i = $i;\n" . 'return "L' . $i . '[" . eval(' . var_export($code, true) . ') . "]" . sleep(1) . $v' . $i . ';';
}
echo eval($code), "\n";
// a big generated include
$f = __DIR__ . '/fixtures/r1_gen43.php';
$src = "<?php\n";
for ($i = 0; $i < 300; $i++) {
    $src .= "function gen$i(\$a) { return eval('return fopen(\$a) . $i;') . (include __DIR__ . '/r1_inc_ret2.php') . usleep($i); }\n";
}
$src .= "return array_sum([1]) . gen0(1) . gen299(2);\n";
file_put_contents($f, $src);
$r = include $f;
echo $r, "\n";
echo gen150(0), "\n";
unlink($f);
