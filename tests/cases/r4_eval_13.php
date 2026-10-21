<?php
namespace App;
eval('namespace App; function strtoupper($x) { return "app:" . $x; }');
echo strtoupper('a'), "\n";
echo \strtoupper('a'), "\n";
eval('namespace Other; echo strtoupper("b"), "\n";');
eval('echo __NAMESPACE__ === "" ? "global" : "ns", "\n"; echo strtoupper("c"), "\n";');
eval('namespace App; echo strtoupper("d"), "\n";');
eval('namespace App; function strtoupper2($x) { return 2; } echo strtoupper("e"), "\n";');
