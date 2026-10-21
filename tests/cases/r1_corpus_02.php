<?php
// Methods named like the include/require/eval keywords are declarations, not constructs
// (found in drupal, moodle, symfony/error-handler, twig: `public function include(...)`).
class K
{
    public function include($p) { return "inc:$p"; }
    public function require($p) { return "req:$p"; }
    public function require_once($p) { return "reqo:$p"; }
    public function eval($p) { return "ev:$p"; }
    public function go() { return $this->include(1) . ' ' . $this->require(2) . ' ' . $this->require_once(3) . ' ' . $this->eval(4); }
}
echo (new K)->go(), "\n";
