<?php
// set_error_handler / set_exception_handler return the previous (mapped) handler
set_error_handler('strtoupper');
var_dump(set_error_handler(fn() => true));
set_error_handler(['Orig\Thing', 'who']);
var_dump(set_error_handler(callback: null));
set_error_handler('\Orig\Thing::who', E_ALL);
var_dump(set_error_handler(null));
$h = 'curl_exec';
set_error_handler($h);
var_dump(set_error_handler(null));
set_exception_handler('fopen');
var_dump(set_exception_handler(null));
