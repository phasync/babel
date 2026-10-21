<?php
// CR-only and mixed line endings: line numbers inside eval, __LINE__, multi-line calls and heredocs.
namespace App;$x = "x";use Orig\{Thing, Base};echo __LINE__, " ", eval("return __LINE__ . basename(__FILE__);"), "\n";
echo fopen("a","r"), " ", __LINE__, "\n";echo <<<EOT  {$x} \{  EOT . Thing::who() . " " . __LINE__ . "\n";
$e = eval("\n\nreturn new \\Exception();");echo $e->getLine(), " ", "same", " ", \substr(\strstr($e->getFile(), "("), 0, 4), "\n";echo (new Base)->name(), " ", __LINE__, "\n";