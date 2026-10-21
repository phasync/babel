<?php
// two files with the same content are two compilations: their call sites do not share a choice
// (php caches per compiled op array)
namespace App;
echo implode(' ', include __DIR__ . '/fixtures/r5_fallback3_a.php'), "\n";
eval('namespace App; function strtoupper($x) { return "local($x)"; } function fopen($x) { return "lf($x)"; }');
echo implode(' ', include __DIR__ . '/fixtures/r5_fallback3_b.php'), "\n";
