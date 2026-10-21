<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
function g() {
    eval(yield
    );
    eval(yield
     'k'
    );
    eval(yield 'k'
     =>
     'v'
    );
    eval(yield from
     h()
    );
}
function h() { yield 1; return 'L("h", __FILE__);'; }
$gen = g();
$gen->current();
$gen->send('L("a", __FILE__);');
$gen->send('L("b", __FILE__);');
$gen->send('L("c", __FILE__);');
$gen->send(null);
