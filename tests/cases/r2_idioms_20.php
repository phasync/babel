<?php
// Variable variables as dynamic class expressions: new $$k, instanceof $$k, ${'k'}::X.
$model = 'Orig\Thing';
$base = 'Orig\Base';
$k = 'model';
$o = new $$k;
echo get_class($o), "\n";
var_dump($o instanceof $$k);
echo get_class(new ${'base'}), ' ', ${'model'}::X, "\n";
