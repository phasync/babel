<?php
namespace z;
function t() {
    $a = 5;
    eval('echo $a, fopen("x"), __NAMESPACE__, "|", __FILE__, "\n";');
    file_put_contents(__DIR__ . '/inc_tmp.php', '<?php namespace q; return [__NAMESPACE__, $a, \fopen("x"), fopen("y")];');
    $r = include 'inc_tmp.php';
    echo json_encode($r), "\n";
    unlink(__DIR__ . '/inc_tmp.php');
}
t();
echo basename(__FILE__), ' ', basename(__DIR__), "\n";
