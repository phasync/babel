<?php
namespace a;
// variable variables as class: `$$n::who()` was wrapped inside the `$` and no longer parsed
$c = 'Orig\Thing';
$n = 'c';
echo $$n::who(), "\n";
echo get_class(new $$n), "\n";
var_dump(new \Repl\Thing instanceof $$n);
echo ${'c'}::who(), "\n";
