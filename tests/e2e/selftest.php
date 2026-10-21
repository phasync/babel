<?php
// Hook fidelity checks: run with and without boot.php and compare (tests/e2e/run-selftest.sh).
declare(strict_types=1);
namespace App;

$r = [];
$m = null;
$r[] = preg_match('/(b)/', 'abc', $m);
$r[] = $m;
$r[] = preg_match('/(b)/', 'abc', $m, PREG_OFFSET_CAPTURE);
$r[] = $m;
$a = [3, 1, 2];
sort($a);
$r[] = $a;
$v = '12';
settype($v, 'integer');
$r[] = $v;
$r[] = sscanf('12 ab', '%d %s', $x, $y);
$r[] = [$x, $y];
$r[] = htmlspecialchars('<a> &amp;', double_encode: false);
$r[] = json_encode(['a' => 1], flags: JSON_PRETTY_PRINT);
$r[] = mt_rand(5, 5);
$r[] = round(2.5);
$r[] = intdiv(7, 2);
$arr = [1, 2, 3];
end($arr);
$r[] = key($arr);
reset($arr);
$r[] = current($arr);
$r[] = max(1, 5, 3);
$r[] = max([1, 9]);
$r[] = implode(',', [1, 2]);
$r[] = sprintf('%05.1f|%s', 3.14159, 'x');
$r[] = vsprintf('%d-%d', [1, 2]);
$r[] = is_int(5);
$r[] = count([1, 2]);
$r[] = in_array('1', [1], true);
$r[] = iterator_to_array(new \ArrayIterator([1, 2]));
$r[] = gettype(1.0);
$r[] = function_exists('fopen');
$r[] = date('Y', 0);
$r[] = mb_substr('æøå', 1, 1);
foreach ([
    fn () => intdiv('7', 2),             // strict: TypeError
    fn () => abs(null),                  // ?int|float in hook: null passes, internal deprecation vs TypeError
    fn () => json_decode(),              // ArgumentCountError text
    fn () => intdiv(1, 2, 3),            // too many
    fn () => intdiv(num2: 2),            // required param skipped by name
    fn () => mt_rand(1),                 // one-argument mt_rand
] as $i => $f) {
    try {
        $r[] = $f();
    } catch (\Throwable $e) {
        $r[] = $i . ':' . get_class($e) . ': ' . $e->getMessage();
    }
}
set_error_handler(function ($no, $str, $file, $line) use (&$r) { $r[] = "E$no $str @" . basename($file) . ":$line"; return true; });
$r[] = @file_get_contents('/nonexistent/x');
$r[] = error_get_last()['message'] ?? null;
$r[] = file_get_contents('/nonexistent/y');
var_export($r);
echo "\n";
