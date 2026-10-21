<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
function g() {
    eval(
yield

);
    eval(yield
'k'

);
    eval(yield 'a' => 'L(__FILE__);'

);
    return eval(yield from h()
);
}
function h() { yield 1; return 'return "from";'; }
$g = g();
$g->current();
$g->send('L(__FILE__);');
$g->send('L(__FILE__);');
$g->send('L(__FILE__);');
$g->send(null);
echo $g->getReturn(), "\n";
