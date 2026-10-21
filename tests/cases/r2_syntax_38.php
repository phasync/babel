<?php
// class expression produced by a call or parenthesised expression, then used with ::
namespace s38;
function cls() { return 'Orig\Thing'; }
$n = 'Orig\Thing';
echo cls()::who(), "\n";
echo ($n)::who(), "\n";
echo [$n][0]::X, "\n";
