<?php
// An enum case named like an alternative-syntax end keyword (EndIf, EndForeach, ...) is a name: it does
// not close the enclosing `if (...):` block, so the function declared in it stays conditional.
namespace App;
if (false):
    enum Cfg { case EndIf; case EndForeach; }
    function fopen($x) { return 'App\fopen'; }
endif;
echo fopen('x'), "\n";
