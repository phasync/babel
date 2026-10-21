<?php
// a mapped string literal that spans lines must keep its line breaks
var_dump(defined('Orig\Thing::X
'));
echo __LINE__, "\n";
var_dump(is_callable("Orig\Thing::who
"));
echo __LINE__, "\n";
trigger_error('here');
