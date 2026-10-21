<?php
// PHP 8.5 pipe operator into mapped first-class callables
namespace s08;
echo 'abc' |> strtoupper(...), "\n";
echo 'x' |> fopen(...) |> strtoupper(...), "\n";
echo 'x' |> \strtoupper(...), "\n";
echo 'x' |> (fn($s) => strtoupper($s)), "\n";
echo 'x' |> \Orig\Thing::who(...) , "\n";
$r = 'p' |> file_get_contents(...);
echo $r, "\n";
echo strlen('abcd' |> strtoupper(...)), "\n";
