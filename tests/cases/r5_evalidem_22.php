<?php
// eval as a member, constant, label and named argument: only the construct is rewritten
class E {
    const EVAL = 'const';
    public $eval = 'prop';
    public function eval($c) { return "method:$c"; }
    public static function __callStatic($n, $a) { return "static:$n"; }
}
enum En { case EVAL; }
function f(...$a) { return json_encode($a); }
$e = new E;
echo $e->eval('x'), ' ', $e?->eval('y'), ' ', E::evalx('z'), ' ', E::EVAL, ' ', $e->eval, ' ', En::EVAL->name, "\n";
echo f(eval: 1), ' ', f(...['eval' => 2]), "\n";
$m = 'eval';
echo $e->$m('w'), ' ', [$e, 'eval']('v'), ' ', E::{'evalz'}('u'), "\n";
echo eval/* c */('return strtoupper("a");'), ' ', EVAL ( 'return fopen("b");' ), "\n";
echo (function () { return eval('return __FUNCTION__ . strtoupper("c");'); })(), "\n";
