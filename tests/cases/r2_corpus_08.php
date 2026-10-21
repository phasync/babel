<?php
namespace a;
use Orig\Thing;
use PDO;
// a named argument `extends:` / `implements:` / `insteadof:` switched on extends-list mode, so the next
// named-argument labels that match a mapped class were rewritten (symfony maker-bundle ClassData::create(),
// `extends: ..., useStatementGenerator: $useStatements` with UseStatementGenerator imported: parse error)
function f($extends = null, $thing = null, $implements = null, $pdo = null, $insteadof = null) { return "[$extends|$thing|$implements|$pdo|$insteadof]"; }
echo f(extends: 'e', thing: 't'), "\n";
echo f(implements: 'i', pdo: 'p'), "\n";
echo f(insteadof: 's', thing: 't'), "\n";
