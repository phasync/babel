<?php
$x = new PDO('sqlite::memory:');
$y = 'PDO';
var_dump(is_a($x, 'PDO'), is_a($x, $y), is_a($x, "\\PDO"), is_subclass_of($x, 'PDO'), $x instanceof PDO, $x instanceof $y);
var_dump(is_a($x, <<<'N'
PDO
N), is_a($x, 'P' . 'DO'), is_a($x, strtoupper('pdo')));
