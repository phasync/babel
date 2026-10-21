<?php
// r3 corpus: a reflection constructor called with argument unpacking - new \ReflectionMethod(...$callable),
// new \ReflectionClass(...$args) - is left alone (there is no shim for constructors), so the class name inside the
// array is not mapped and the original class is reflected, while new \ReflectionMethod('Orig\Thing', 'who') is
// mapped. Seen in twig ReflectionCallable / CallExpression and symfony http-kernel ControllerEvent.
$cb = ['Orig\Thing', 'who'];
$a = ['Orig\Thing'];
echo (new ReflectionMethod(...$cb))->class, ' ', (new \ReflectionClass(...$a))->getName(), ' ', (new ReflectionMethod('Orig\Thing', 'who'))->class, "\n";
