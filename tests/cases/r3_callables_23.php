<?php
// spl_autoload_register with closures, static closures, strings and arrays
spl_autoload_register(function ($c) { if ($c === 'R3cb23\A') { echo "closure:$c\n"; } });
spl_autoload_register(static fn($c) => $c === 'R3cb23\A' ? print("static:$c\n") : null);
class R3cb23L { static function load($c) { if ($c === 'R3cb23\A') { echo "L:$c\n"; } } }
spl_autoload_register('R3cb23L::load');
spl_autoload_register(['R3cb23L', 'load']);
var_dump(class_exists('R3cb23\A'));
var_dump(spl_autoload_unregister('R3cb23L::load'));
