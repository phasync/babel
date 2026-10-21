<?php
// reference-returning replacement through the check; reference-taking first argument (custom map)
namespace Y {
    function &store() { static $s = ['v' => 1]; return $s; }
    function push(array &$a, ...$v) { foreach ($v as $x) { $a[] = "Y:$x"; } return count($a); }
}
namespace {
    $b = new phasync\Babel\Babel(['key' => 'Y\store', 'array_push' => 'Y\push']);
    $code = $b->translate('<?php namespace App;
    $r = &key();
    $r["v"] = 2;
    echo json_encode(key()), "\n";
    $a = [];
    echo array_push($a, 1, 2), " ", json_encode($a), "\n";
    $p = array_push(...);
    $p($a, 3);
    echo json_encode($a), "\n";
    ', 'virtual.php');
    eval(substr($code, 5));
}
