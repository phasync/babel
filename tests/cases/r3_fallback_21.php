<?php
// property hooks (PHP 8.4) and promoted hooks call through the check
namespace App;
class P {
    public string $v = 'x' {
        get => strtoupper($this->v);
        set(string $s) { $this->v = fopen($s); }
    }
    public function __construct(public string $w = 'w' { get => strtoupper($this->w) . '/' . usleep(1); }) {}
}
$p = new P();
echo $p->v, ' ', $p->w, "\n";
$p->v = 'y';
echo $p->v, "\n";
function usleep($n) { return 'local-usleep'; }
