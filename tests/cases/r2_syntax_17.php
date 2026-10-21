<?php
// alternative syntax control flow with nested function/class declarations
namespace s17;
use Orig\Thing;
if (fopen('x')):
    function f(Thing $t): Thing { return $t; }
    foreach ([1] as $v):
        class K extends \Orig\Base { public function g(?Thing $t = null): string { return ($t ?? new Thing)::who(); } }
        switch (true):
            case strtoupper('a') === 'HOOK:strtoupper':
                echo f(new Thing)::who(), ' ', (new K)->g(), ' ', (new K)->name(), "\n";
                break;
        endswitch;
    endforeach;
elseif (sleep(1)):
else:
endif;
for ($i = 0; $i < 1; $i++):
    while (false):
    endwhile;
    $r = $i ? fopen('a') : strtoupper('b');
    echo $r, "\n";
endfor;
