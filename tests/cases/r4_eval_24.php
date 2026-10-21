<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
function s() {
    static $x = eval('L(__FILE__); return fopen("x");');
    static $y = EVAL /* c */ (
        'L(__FILE__); return 2;'
    ), $z = [eval('return 3;')];
    return $x . $y . $z[0];
}
echo s(), "\n";
echo s(), "\n";
$a = fn() => Eval('L(__FILE__); return fopen("y");');
echo $a(), "\n";
echo (function () { return eval('return __FUNCTION__ . "|" . fopen("z");'); })(), "\n";
