<?php
// The alias of __COMPILER_HALT_OFFSET__ (and the name itself) used as class, function, label and method names.
namespace A;
use const __COMPILER_HALT_OFFSET__ as H;
class H { const X = 'clsH'; public static function H() { return 'mH'; } }
function H(H $h) { return \get_class($h); }
class __COMPILER_HALT_OFFSET__ { const V = 'clsHalt'; }
echo H > 0 ? 'ok' : 'bad', ' ', H::X, ' ', H::H(), ' ', H(new H), ' ', __COMPILER_HALT_OFFSET__::V, ' ', \get_class(new __COMPILER_HALT_OFFSET__), "\n";
echo H instanceof H ? 'inst' : 'noinst', ' ', \__COMPILER_HALT_OFFSET__ === H ? 'same' : 'diff', "\n";
__halt_compiler();data
