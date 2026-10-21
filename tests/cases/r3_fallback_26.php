<?php
// group use function imports and eval code inside a namespaced file
namespace App\Lib {
    function fopen($x) { return 'Lib:fopen'; }
}
namespace App {
    use App\Lib\{function fopen, function fopen as fo};
    use function strtoupper as su, usleep as us;
    echo fopen('a'), ' ', fo('b'), ' ', su("c"), " ", strtoupper("c"), " ", us(1), "\n";
    echo eval('return strtoupper("d") . " " . fopen("e");'), "\n";
    echo eval('namespace App; return strtoupper("f");'), "\n";
    function strtoupper($s) { return 'App:strtoupper'; }
}
