<?php
// a handler registered with a mapped literal must be removable with the same literal
spl_autoload_register('Orig\Thing::who');
var_dump(spl_autoload_unregister('Orig\Thing::who'));
spl_autoload_register(['Orig\Thing', 'who']);
var_dump(spl_autoload_unregister(['Orig\Thing', 'who']));
