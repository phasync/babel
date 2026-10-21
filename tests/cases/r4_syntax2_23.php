<?php
// An arrow function in the middle operand of a ternary ends at the ':' of that ternary: the call in
// the else operand is a plain call site (PHP keeps its namespace fallback once resolved).
namespace App;

function run($x) { return $x ? fn () => 'arrow' : fopen('a'); }
echo run(false), "\n";
eval('namespace App; function fopen($x) { return "App-fopen"; }');
echo run(false), ' ', run(true)(), "\n";
