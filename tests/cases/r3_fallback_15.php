<?php
// function names and namespace names are case-insensitive
namespace APP {
    function FOPEN($x) { return 'APP:FOPEN'; }
}
namespace app {
    echo Fopen('x'), ' ', FoPeN('y'), "\n";
}
namespace App\Sub {
    if (true) { function StrToUpper($s) { return 'Sub:StrToUpper'; } }
}
namespace app\SUB {
    echo strtoupper('z'), ' ', STRTOUPPER('w'), "\n";
}
