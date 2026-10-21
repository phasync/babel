<?php
class K {
    public function eval($c) { return "m-eval($c)" . fopen('a'); }
    public function include($p) { return "m-include($p)"; }
    public function require($p) { return "m-require($p)"; }
    public static function require_once($p) { return "s-ro($p)"; }
    public function include_once($p) { return "m-io($p)"; }
}
$k = new K;
echo $k->eval('x'), $k->include('y'), $k->require('z'), K::require_once('r'), $k->include_once('i'), "\n";
