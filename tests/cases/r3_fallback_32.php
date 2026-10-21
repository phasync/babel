<?php
// the namespaced function shadows only in its own namespace, not in sub- or parent namespaces
namespace App;
eval('namespace App\Sub; function fopen($x) { return "Sub:fopen"; }');
echo fopen('x'), ' ', \App\Sub\call(), ' ', \App\Sub\Deep\call(), "\n";
namespace App\Sub;
function call() { return fopen('y'); }
namespace App\Sub\Deep;
function call() { return fopen('z'); }
