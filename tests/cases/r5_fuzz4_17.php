<?php
// a class replacement must be a valid class name: reserved type names (int, self, static, mixed,
// array, iterable, parent ...) cannot be, and accepting them yields translations that do not compile
use phasync\Babel\Babel;
foreach (['int', 'self', 'static', 'parent', 'array', 'mixed', 'iterable', 'never', 'void', 'null', 'false'] as $to) {
    try {
        $b = new Babel([], ['Orig\Thing' => $to]);
        $out = $b->translate("<?php function f(\\Orig\\Thing \$t): \\Orig\\Thing { return new \\Orig\\Thing; }\n", '/x.php');
        $f = tempnam(sys_get_temp_dir(), 'r5f') . '.php';
        file_put_contents($f, $out);
        exec('php -l ' . escapeshellarg($f) . ' 2>&1', $o, $rc);
        unlink($f);
        echo $to, ': accepted, ', $rc === 0 ? 'compiles' : 'does not compile', "\n";
    } catch (\InvalidArgumentException) {
        echo $to, ": rejected\n";
    }
}
