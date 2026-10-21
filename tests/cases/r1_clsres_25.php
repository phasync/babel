<?php
namespace dynprop;
class Factory {
    public string $cls = 'Orig\Thing';
    public static string $scls = 'Orig\Base';
    public array $map = ['t' => 'Orig\Thing'];
    public function make() { return new $this->cls; }
    public function makeStatic() { return new static::$scls; }
    public function makeMap() { return new $this->map['t']; }
    public function who() { return $this->cls::who(); }
    public function check($o) { return $o instanceof $this->cls; }
    public function is($o) { return is_a($o, $this->cls); }
}
$f = new Factory;
echo get_class($f->make()), ' ', get_class($f->makeStatic()), ' ', get_class($f->makeMap()), ' ', $f->who(), ' ', var_export($f->check(new \Repl\Thing), true), var_export($f->is(new \Repl\Thing), true), "\n";
$arr = ['k' => 'Orig\Thing'];
echo get_class(new $arr['k']), ' ', $arr['k']::who(), ' ', var_export(new \Repl\Thing instanceof $arr['k'], true), "\n";
