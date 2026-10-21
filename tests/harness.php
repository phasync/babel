<?php
// Usage: php harness.php <case.php>  - runs the case translated with tests/map.php. Included files are
// translated by a test-only stream wrapper (tests/IncludeWrapper.php), as a consumer of the library does.
use phasync\Babel\Babel;
use phasync\Babel\Runtime;
use phasync\Babel\Tests\IncludeWrapper;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/hooks.php';
require __DIR__ . '/IncludeWrapper.php';
$case = realpath($argv[1]);
$map = require __DIR__ . '/map.php';
$babel = new Babel($map['functions'], $map['classes']);

// Invariants checked for every case, before running it.
$src = file_get_contents($case);
$out = $babel->translate($src, $case);
if (preg_match_all('/\r\n|\r|\n/', $src) !== preg_match_all('/\r\n|\r|\n/', $out)) {
    echo "INVARIANT: line count changed\n";
}
$tmp = tempnam(sys_get_temp_dir(), 'bl') . '.php';
file_put_contents($tmp, $out);
exec('php -l ' . escapeshellarg($tmp) . ' 2>&1', $o, $rc);
unlink($tmp);
if ($rc !== 0) {
    echo "INVARIANT: translated output fails php -l: ", implode(' ', $o), "\n";
}
// Translating translated code again changes nothing, also without the marker that short-cuts it.
$bare = str_replace([$babel->marker . ' ', $babel->marker], '', $out);
if ($out !== $src && str_replace([$babel->marker . ' ', $babel->marker], '', $babel->translate($bare, $case)) !== $bare) {
    echo "INVARIANT: translating the translation again changed it\n";
}
if ((new Babel())->translate($src, $case) !== $src) {
    echo "INVARIANT: identity map changed the source\n";
}

Runtime::configure($babel);
// load the library before the wrapper intercepts file loading (it would have to translate itself)
class_exists(\phasync\Babel\Unit::class);
IncludeWrapper::register($babel);
require $case;
