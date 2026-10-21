<?php
namespace x;
class K {
    public function fopen($a) { return 'method-fopen'; }
    public static function sleep($a) { return 'static-sleep'; }
    public function run() {
        $c = function () { return fopen('a'); };
        $f = fn($z) => sleep($z);
        $s = static fn() => usleep(1);
        $g = (function () { yield fopen('g'); yield $this->fopen(1); yield self::sleep(1); yield static::sleep(2); })();
        $m = match (true) { default => strtoupper('m') };
        $t = true ? file_get_contents('t') : curl_exec();
        $r = $w = $e = []; $n = null ?? stream_select($r, $w, $e, 0);
        return [$c(), $f(1), $s(), iterator_to_array($g), $m, $t, $n, $this->fopen(2), K::sleep(3), $this?->fopen(4)];
    }
}
echo json_encode((new K)->run()), "\n";
