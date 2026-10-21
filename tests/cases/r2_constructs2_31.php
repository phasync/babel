<?php
class K {
    const INCLUDE = 'ci';
    const EVAL = 'ce';
    const __FILE__ = 'cf';
    public $require = 'pr';
    function include($x) { return "m:$x"; }
    function eval($x) { return "e:$x"; }
    static function require_once($x) { return "s:$x"; }
}
enum E: string { case Include = 'I'; case Eval = 'V'; case Require_once = 'R'; }
function f(...$a) { return json_encode($a); }
$k = new K;
echo $k->include('a'), $k->eval('b'), K::require_once('c'), $k?->include('d'), $k->require, "\n";
echo K::INCLUDE, K::EVAL, K::__FILE__, $k::EVAL, E::Include->value, E::Eval->value, E::Require_once->name, "\n";
echo f(include: 1, eval: 2, require_once: 3), "\n";
$m = 'include';
echo $k->$m('z'), [$k, 'eval']('y'), "\n";
echo json_encode(array_column([['include' => 1]], 'include')), "\n";
