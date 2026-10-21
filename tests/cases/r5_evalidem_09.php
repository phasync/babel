<?php
// reserved type names are not valid class names: the constructor rejects them, as a replacement
// (the translation would not compile: '\static' is an invalid class name) and as a mapped class
use phasync\Babel\Babel;
foreach (['self', 'static', 'parent', 'int', 'array', 'never', 'mixed', 'iterable'] as $name) {
    foreach ([['Orig\Thing' => $name], [$name => 'Repl\Thing']] as $map) {
        try {
            new Babel([], $map);
            echo json_encode($map), " accepted\n";
        } catch (InvalidArgumentException) {
            echo json_encode($map), " rejected\n";
        }
    }
}
