<?php
namespace Other;
const sleep = 'K';
class fopen { function who() { return 'cls-fopen '; } }
class Thing { function who() { return 'cls-thing '; } }
function curl_exec() { return 'other-curl'; }
namespace app;
use Other\fopen;
use const Other\sleep;
use Other\{usleep, Thing as strtoupper};
use function Other\{curl_exec};
use Other as file_get_contents;
echo fopen('x'), sleep(1), usleep(1), strtoupper('x'), file_get_contents('y'), curl_exec(), "\n";
echo (new fopen)->who(), (new strtoupper)->who(), \Other\sleep, file_get_contents\Thing::class, "\n";
$f = fopen(...); echo $f(), "\n";
