<?php
namespace App;
$code = 'namespace App; return fopen("x") . "|" . \strlen("ab");';
for ($i = 0; $i < 3; $i++) {
    echo eval($code), "\n";
    if ($i === 0) {
        eval('namespace App; function fopen($x) { return "local"; }');
    }
}
