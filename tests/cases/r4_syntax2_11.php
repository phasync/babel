<?php
declare(strict_types=1);
namespace App;

declare(ticks=1):
    echo fopen('d1'), "\n";
enddeclare;
declare(ticks=1) {
    echo sleep(1), "\n";
}
if (true):
    function usleep($x) { return 'App\usleep'; }
elseif (false):
    echo 'no';
else:
    echo 'no';
endif;
for ($i = 0; $i < 2; $i++):
    switch ($i):
        case 0:
            echo usleep(1), ' ';
            break;
        default:
            echo match (true) { $i > 0 => strtoupper('m'), default => 'x' }, "\n";
    endswitch;
endfor;
foreach ([1] as $v):
    while (false): endwhile;
    ?>inline <?= fopen('i'), ' ', __LINE__ ?>

<?php
endforeach;
$m = match (fopen('a')) { 'HOOK:fopen' => \Orig\Thing::class, default => 'no' };
echo $m, "\n";
if (1) { ?>T<?php } else { ?>F<?php }
echo "\n";
