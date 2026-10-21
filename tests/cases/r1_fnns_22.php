<?php
namespace l
{
    function &sleep(&$x) { $y = 'ref-own'; return $y; }
    $a = 1;
    echo sleep($a), \sleep(1), namespace\sleep($a), "\n";
    $r = &sleep($a);
    echo $r, "\n";
    $f = /* c */ fopen /* d */
        /* e */ (
        'x'
    );
    echo $f, "\n";
    $g = #[\Deprecated] fn() => fopen(
        'x'
    );
    echo @$g(), @fopen('x'), "\n";
}
