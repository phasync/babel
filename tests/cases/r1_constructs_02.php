<?php
namespace N\M;
use function fopen as op;
class K {
    public function m($v) {
        return eval('return [__NAMESPACE__, __CLASS__, $v, fopen("a"), \fopen("b"), namespace\fopen("c")];');
    }
}
function f() {
    $loc = 3;
    eval('$loc++; $new = usleep(1);');
    return [$loc, $new];
}
function fopen() { return 'local'; }
echo json_encode((new K)->m(7)), "\n";
echo json_encode(f()), "\n";
