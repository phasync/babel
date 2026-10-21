<?php
// ${expr} and (expr) as the class of a static call.
$cls = 'Orig\Thing';
echo ${'cls'}::who(), "\n";
echo ($cls)::who(), "\n";
echo ($cls)::X, "\n";
