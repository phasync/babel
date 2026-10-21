<?php
// eval in a loop (a template engine in a long-running worker): each eval is compiled anew and its
// call sites are freed with it; memory must not grow with the number of evals
namespace App;
$run = function (int $n) { for ($i = 0; $i < $n; $i++) { eval('namespace App; return strtoupper("x") . fopen("y") . usleep(1);'); } };
$run(1000);
$m0 = memory_get_usage();
$run(20000);
$grow = memory_get_usage() - $m0;
echo $grow < 1024 * 1024 ? "bounded\n" : "grew by " . round($grow / 1048576) . " MB\n";
