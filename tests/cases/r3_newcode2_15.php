<?php
// __COMPILER_HALT_OFFSET__ as a non-constant name: multi-const item, enum case, trait alias, goto label, namespaced function.
namespace App;
const A = 1, __COMPILER_HALT_OFFSET__ = 2;
enum E { case __COMPILER_HALT_OFFSET__; }
trait T { public function m() { return 'm'; } }
class C { use T { m as __COMPILER_HALT_OFFSET__; } }
function __COMPILER_HALT_OFFSET__() { return 'fn'; }
goto __COMPILER_HALT_OFFSET__;
echo "skipped\n";
__COMPILER_HALT_OFFSET__:
echo \App\__COMPILER_HALT_OFFSET__, ' ', E::__COMPILER_HALT_OFFSET__->name, ' ', (new C)->__COMPILER_HALT_OFFSET__(), ' ', __COMPILER_HALT_OFFSET__(), "\n";
echo __COMPILER_HALT_OFFSET__ > 2 ? 'g' : 'x', ' ', \__COMPILER_HALT_OFFSET__ > 2 ? 'g' : 'x', "\n";
__halt_compiler();data
