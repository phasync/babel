<?php
// code translated ahead of time (with or without its marker) and then eval'd twice is compiled twice by
// PHP: the second compilation has call sites of its own and sees the namespaced function defined in between
namespace App;
$t = \phasync\Babel\Runtime::babel()->translate('<?php namespace App; return strtoupper("e") . fopen("f");', '/x/pre.php');
$t = substr($t, strpos($t, '<?php') + 5);
$bare = preg_replace('~/\*phasync-babel:\w+\*/~', '', $t);
echo eval($t), ' ', eval($bare), "\n";
eval('namespace App; function strtoupper($x) { return "local"; } function fopen($x) { return "lf"; }');
echo eval($t), ' ', eval($bare), "\n";
