<?php
// WordPress/legacy style: variable variables hold class names (extract()-like loaders).
$config = ['model' => 'Orig\Thing', 'base' => 'Orig\Base'];
foreach ($config as $key => $value) {
    $$key = $value;
}
$which = 'model';
echo $$which::who(), "\n";
echo $$which::X, ' ', $$which::$p, "\n";
