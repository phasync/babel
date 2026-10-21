<?php
// Default off: with includeHandler null and fileConstants false (Babel's defaults), translate()
// leaves include/require and __FILE__/__DIR__ completely alone -- byte for byte, like the rest of
// an identity map.
namespace {
    $b = new phasync\Babel\Babel(['sleep' => 'Hook\sleep']); // a map that is not empty: isIdentity() is false
    $src = '<?php
    function f() { return [__FILE__, __DIR__]; }
    include "a.php";
    include("b.php");
    require_once $path;
    ';
    $out = $b->translate($src, '/my/app/file.php');
    $bare = str_replace([$b->marker . ' ', $b->marker], '', $out);
    echo $bare === $src ? 'unchanged' : 'CHANGED', "\n";
}
