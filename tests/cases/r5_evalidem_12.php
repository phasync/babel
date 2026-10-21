<?php
namespace App;
$f = function () { return fopen('x'); };
echo $f(), "\n";
eval('namespace App; function fopen(...$a) { return "App:fopen"; }');
echo $f(), "\n";
// a closure serializer evals the source text of the closure (here: as the include wrapper served it)
// each eval is compiled anew by PHP, with a call-site cache of its own
$babel = \phasync\Babel\Runtime::babel();
$lines = explode("\n", $babel->translate(implode('', file(__FILE__)), __FILE__));
$body = substr($lines[2], strpos($lines[2], 'function'), -1);
$g = eval('namespace App; return ' . $body . ';');
echo $g(), "\n";
$h = eval('namespace App; return ' . substr(file(__FILE__)[2], 5, -2) . ';');
echo $h(), "\n";
