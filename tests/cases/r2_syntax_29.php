<?php
// property hook arrow bodies that call free functions named get()/set()
namespace s29;
function get($x) { return "get($x)"; }
function set($x) { return "set($x)"; }
class C {
    public string $p { get => set(strtoupper('a')); }
    public string $q = '' { set => get(fopen($value)); }
}
$c = new C;
$c->q = 'v';
echo $c->p, ' ', $c->q, "\n";
