<?php
// Variable variables as class expressions.
$cls = 'Orig\Thing'; $n = 'cls';
echo $$n::who(), "\n";
echo get_class(new $$n), "\n";
echo $$n::X, "\n";
