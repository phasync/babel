<?php
// use function imports interplay with the fallback
namespace App\Lib {
    function fopen($x) { return 'Lib:fopen'; }
}
namespace App {
    use function App\Lib\fopen;
    use function strtoupper as up;
    use function usleep;
    function strtoupper($s) { return 'App:strtoupper'; }
    echo fopen('x'), ' ', up('a'), ' ', strtoupper('b'), ' ', usleep(1), ' ', sleep(1), "\n";
}
