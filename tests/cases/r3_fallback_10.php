<?php
// by-reference parameters through the run time check (custom map)
namespace X {
    function pm($p, $s, &$m = null, $flags = 0) { $m = ['mapped', $s]; return 7; }
    function srt(array &$a) { $a = ['sorted-by-X']; return true; }
}
namespace {
    $b = new phasync\Babel\Babel(['preg_match' => 'X\pm', 'sort' => 'X\srt']);
    $code = $b->translate('<?php namespace App;
    $m = null;
    echo preg_match("/a/", "abc", $m), " ", json_encode($m), "\n";
    $a = [3, 1];
    sort($a);
    echo json_encode($a), "\n";
    $r = &$a;
    sort(...[&$r]);
    echo json_encode($a), "\n";
    $g = preg_match(...);
    $g("/a/", "q", $mm);
    echo json_encode($mm), "\n";
    ', 'virtual.php');
    echo str_contains($code, "Runtime::ns(") ? "checked\n" : "plain\n";
    eval(substr($code, 5));
}
