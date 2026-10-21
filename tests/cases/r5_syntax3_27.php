<?php
// the constructor rejects class replacements that are not valid class names (reserved words): the
// translation would not compile ('\static' is an invalid class name, '\int' must be unqualified as a type)
use phasync\Babel\Babel;
foreach (['static', 'self', 'parent', 'int', 'string', 'mixed', 'never'] as $to) {
    try {
        $b = new Babel([], ['Orig\Thing' => $to]);
        $out = $b->translate('<?php function f(Orig\Thing $t): Orig\Thing { return new Orig\Thing; }', '/x.php');
        echo "accepted $to: ", substr($out, strpos($out, 'function')), "\n";
    } catch (\InvalidArgumentException $e) {
        echo "rejected $to\n";
    }
}
