<?php
// PHP 8.4 new without parentheses, followed by a member returning a class name
class Box { public $p = 'Orig\Thing'; public function m() { return 'Orig\Thing'; } }
echo new Box()->m()::who(), "\n";
echo new Box()->p::who(), "\n";
echo new Box()->m()::X, "\n";
echo (new Box)->m()::who(), "\n";
echo (new Box())->p::$p, "\n";
