<?php
// a function in the same namespace declared in a later namespace block of the same file is hoisted
namespace App {
    echo fopen('x'), "\n";
    echo \App\Sub\g(), "\n";
}
namespace Other {
    echo strtoupper('o'), "\n";
}
namespace App {
    function fopen($x) { return 'local-fopen'; }
}
namespace App\Sub {
    function g() { return strtoupper('g') . ' ' . fopen('s'); }
}
