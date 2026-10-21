<?php
class S { function __construct(public $c) {} function __toString(): string { echo "[toString]"; return $this->c; } }
function t($c) { try { var_dump(eval($c)); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; } }
t(new S('return fopen("x");'));
t(null);
t(42);
t(1.5);
t(true);
t(false);
t(new stdClass);
t(['return 1;']);
t(new S("return __LINE__;"));
enum E: string { case A = 'return 1;'; }
t(E::A);
t(E::A->value);
