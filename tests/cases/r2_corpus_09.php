<?php
namespace a;
use PDO;
// a named argument `function:` / `fn:` made the next `(` a parameter list, so the argument labels in the
// following call were taken for parameter types and rewritten as class names
function g($function = null, $fn = null, $pdo = null) { return "[$function|$fn|$pdo]"; }
echo g(function: 'f'), g(pdo: 'p'), "\n";
echo g(fn: 'x'), g(pdo: 'q'), "\n";
