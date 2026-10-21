<?php
class K {
    public $f = 'strtoupper'; public $c = 'Orig\Thing';
    public string $a { get => ($this->f)('a'); }
    public string $b { get { return $this->c::who() . [$this->f][0]('b'); } }
    public string $d = '' { set(string $v) { $this->d = ($this->f)($v) . "{$this->c::who()}"; } }
    public private(set) string $e = 'x' { get => $this->c::$p . $this->e; }
}
$k = new K;
echo $k->a, "\n", $k->b, "\n";
$k->d = 'q'; echo $k->d, "\n", $k->e, "\n";
