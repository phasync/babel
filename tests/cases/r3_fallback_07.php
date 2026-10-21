<?php
// static variable initialisers (arbitrary expressions since PHP 8.3) take the run time check
namespace App;
function counter() {
    static $label = strtoupper('s') . '/' . fopen('x');
    static $n = 0;
    return $label . ':' . ++$n;
}
eval('namespace App; function strtoupper($x) { return "local"; }');
echo counter(), "\n", counter(), "\n";
