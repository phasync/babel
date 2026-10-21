<?php
interface I { public function eval(string $c = 'i'): string; }
abstract class A implements I { abstract public function EVAL(
    string $c = 'a'
): string; }
trait T { public function run($c) { return "T::run:$c"; } public function eval(string $c = 't'): string { return "T::eval:$c"; } }
trait U { public function eval(string $c = 'u'): string { return "U::eval:$c"; } }
class B extends A {
    use T, U { T::eval insteadof U; U::eval as uEval; T::run as protected Eval2; }
    public function go() { return [$this->eval('t'), $this->uEval('u'), self::eval('s'), static::eval(), $this->Eval2('r')]; }
}
class C extends B { public function eval(string $c = 'c'): string { return 'C:' . parent::eval($c); } }
print_r((new C)->go());
class S { static function eval($x) { return "S:$x"; } static function go() { return self::eval(1) . static::eval(
'2'
); } }
echo S::go(), "\n";
function named(...$a) { return implode(',', array_keys($a)); }
echo named(eval: 1, EVAL: 2), "\n";
try { \eval('return 1;'); } catch (Error $e) { echo $e->getMessage(), "\n"; }
try { namespace\eval('return 1;'); } catch (Error $e) { echo $e->getMessage(), "\n"; }
