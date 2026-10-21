<?php
if (true):
    echo fopen('a'), "\n";
elseif (false):
    echo sleep(1);
else:
    echo usleep(1);
endif;
foreach ([1,2] as $v):
    echo strtoupper('x'), $v, "\n";
endforeach;
for ($i = 0; $i < 1; $i++): echo fopen('f'), "\n"; endfor;
$i = 0;
while ($i++ < 1): echo sleep(1), "\n"; endwhile;
switch (1):
    case 1: echo file_get_contents('x'), "\n"; break;
    default: echo "no";
endswitch;
goto end;
echo "skipped";
end:
echo fopen('z'), "\n";
declare(ticks=1);
declare(ticks=1): echo fopen('t'), "\n"; enddeclare;
declare(ticks=1) { echo sleep(5), "\n"; }
