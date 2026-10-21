<?php
// methods and property hooks of a class declared inside a closure are not closures: their call sites
// keep the first choice like any method
namespace App;
$make = function () {
    return new class {
        public string $v { get => strtoupper('h'); }
        public string $w { get { return strtoupper('w'); } }
        function m() { return strtoupper('m'); }
    };
};
$o = $make();
echo $o->v, ' ', $o->w, ' ', $o->m(), "\n";
eval('namespace App; function strtoupper($x) { return "local"; }');
echo $o->v, ' ', $o->w, ' ', $o->m(), "\n";
