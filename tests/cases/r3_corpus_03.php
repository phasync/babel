<?php
// r3 corpus: callable parameters missing from the translator's list although PHP types them `callable`:
// seen in the corpus: spl_autoload_unregister, pcntl_signal, xml_set_*_handler, libxml_set_external_entity_loader,
// apcu_entry, readline_completion_function; also unregister_tick_function, session_set_save_handler. A string or
// class-string array callable registered through a listed function is mapped (Repl\Thing::who) but the unregister
// call passes the unmapped one, so spl_autoload_unregister() does not find it.
spl_autoload_register('Orig\Thing::who');
var_dump(spl_autoload_unregister('Orig\Thing::who'));
$cb = 'Orig\Thing::who';
spl_autoload_register($cb);
var_dump(spl_autoload_unregister($cb));
