<?php
namespace a;
function setup() {
    function sleep($x) { return 'inner-own'; }
}
echo fopen('x'), ' ', sleep(1), "\n";
setup();
echo sleep(1), "\n";
