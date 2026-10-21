<?php
namespace interp;
$cls = 'Orig\Thing';
$o = new \Repl\Thing;
echo "{$cls::who()}|", "{$o::who()}|", "{$cls::$p}|", "$cls::X\n";
echo <<<TXT
 h: {$cls::who()} {$o::who()}
 TXT, "\n";
$f = fn() => "{$cls::who()}";
echo $f(), "\n";
