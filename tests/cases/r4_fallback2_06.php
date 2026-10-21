<?php
// a file included twice is compiled twice: the second inclusion resolves its call sites again
namespace App;
echo include __DIR__ . '/fixtures/r4_fallback2_inc.php', "\n";
eval('namespace App; function strtoupper($x) { return "local"; }');
echo include __DIR__ . '/fixtures/r4_fallback2_inc.php', "\n";
