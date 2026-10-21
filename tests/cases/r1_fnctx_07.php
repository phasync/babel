<?php
use Orig\Thing;
class P {
    public Thing $t {
        set(Thing $v) { $this->t = $v; }
    }
    public string $s = 'x' {
        get => fopen('h') . $this->s;
        set(string $v) { $this->s = strtoupper($v); }
    }
}
$p = new P;
$p->t = new Repl\Thing;
echo get_class($p->t), "\n";
try { $p->t = new stdClass; } catch (TypeError $e) { echo "TypeError\n"; }
$p->s = 'a'; echo $p->s, "\n";
