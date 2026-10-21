<?php
// closures returned by eval'd code: each eval of the same string at one site is a compilation of its own,
// while all closure objects of one compilation share its choice
namespace App;
$cs = [];
for ($i = 0; $i < 3; $i++) {
    $cs[] = eval('namespace App; return function () { return strtoupper("c"); };');
    if ($i === 0) echo $cs[0](), "\n";
    if ($i === 1) eval('namespace App; function strtoupper($x) { return "local($x)"; }');
}
foreach ($cs as $c) echo $c(), ' ';
echo "\n";
$a = eval('namespace App; return fn() => strtoupper("a");'); $b = eval('namespace App; return fn() => strtoupper("b");');
echo $a(), ' ', $b(), "\n";
