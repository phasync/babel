<?php
namespace hk;
class P {
    public function __construct(private string $n = 'n') {}
    public string $name {
        get => strtoupper($this->n);
        set(string $v) { $this->n = sleep(1) . $v; }
    }
    public private(set) string $other = 'o';
    public function other() { return fopen('x'); }
}
$p = new P;
echo $p->name, "\n";
$p->name = 'z';
echo $p->name, $p->other(), "\n";
(void) sleep(1);
echo "done\n";
