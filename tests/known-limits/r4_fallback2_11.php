<?php
// functions PHP refuses to call dynamically, when mapped (custom map), still honour a namespaced
// function of that name that the file declares conditionally or that exists at run time
namespace X { function compact(...$a) { return 'X:compact'; } function extract(...$a) { return 'X:extract'; } }
namespace {
    $b = new phasync\Babel\Babel(['compact' => 'X\compact', 'extract' => 'X\extract']);
    $code = $b->translate('<?php namespace App;
if (!\function_exists("App\compact")) { function compact(...$a) { return "App:compact"; } }
function f() { $v = 1; $arr = ["w" => 2]; return compact("v") . " " . extract($arr); }
echo f(), "\n";
', '/x/a.php');
    eval('?>' . $code);
    eval('namespace App; function extract(...$a) { return "App:extract"; }');
    echo App\f(), "\n";
    $code = $b->translate('<?php namespace App; function g() { $w = 3; return compact("w") . " " . extract($w); } echo g(), "\n";', '/x/b.php');
    eval('?>' . $code);
}
