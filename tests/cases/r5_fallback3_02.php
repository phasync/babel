<?php
// a function declared in a bare block at the top level is bound when the file is compiled, like any top
// level declaration (unlike one in a declare() block): first-class callables in constant expressions find it
namespace App;
const F = strtoupper(...);
class K { const F = strtoupper(...); }
echo (F)('x'), ' ', (K::F)('z'), ' ', strtoupper('w'), "\n";
{
    function strtoupper($s) { return "local($s)"; }
}
