<?php
// The temporaries of a nullsafe chain must not keep the base object alive (destructor timing).
class D { public $b = 'Orig\Thing'; public function __destruct() { echo "destruct\n"; } }
function f() {
    $a = new D;
    echo $a?->b::who(), "\n";
    unset($a);
    echo "after unset\n";
}
f();
echo (new D)?->b::who(), "\n";
echo "after temporary\n";
