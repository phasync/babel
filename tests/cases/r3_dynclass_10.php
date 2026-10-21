<?php
// Variable variables as class expressions
$c = 'Orig\Thing';
$n = 'c';
$m = 'n';
echo $$n::who(), "\n";
echo $$$m::who(), "\n";
echo ${'c'}::who(), "\n";
echo ${$n === 'c' ? 'c' : 'x'}::X, "\n";
echo $$n::$p, "\n";
echo ${$n}::who(), "\n";
echo $${${'m'}}::who(), "\n";
