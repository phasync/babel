<?php
// Syntax errors in eval'd code must surface as ParseError from PHP, never as an exception from the translator.
$snips = ['use function fopen as', 'use Orig\{Thing,', 'use Orig\Thing as', 'namespace', 'fopen(', 'function f(Orig\Thing', 'class A extends', 'use function Foo\{fopen as', "fopen('a') ?> <?php fopen(", 'new', 'eval(', 'include', 'is_a($x,', 'use A\B\{C as D, E'];
foreach ($snips as $s) {
    try {
        eval($s);
        echo "no error: $s\n";
    } catch (ParseError $e) {
        echo "ParseError\n";
    } catch (Throwable $e) {
        echo get_class($e), ' for ', $s, "\n";
    }
}
