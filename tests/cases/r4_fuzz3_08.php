<?php
// PHP 8.4 property hooks: parent::$prop::get() / parent::$prop::set() call the parent's hook; it is not
// a static property used as a class name and must not be wrapped
class P { public string $p = 'base' { get => 'P:' . $this->p; set(string $v) { $this->p = strtoupper($v); } } }
class C extends P {
    public string $p { get => 'C:' . parent::$p::get(); set(string $v) { parent::$p::set($v . '!'); } }
}
$c = new C; $c->p = 'x'; echo $c->p, "\n";
