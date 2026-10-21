<?php
// instanceof (expr): arbitrary-expression class name on the right of instanceof
namespace s25;
$c = 'Orig\Thing';
$o = new \Orig\Thing;
echo $o instanceof $c ? "plain-yes\n" : "plain-no\n";
echo $o instanceof ($c) ? "paren-yes\n" : "paren-no\n";
echo $o instanceof ('Orig\\' . 'Thing') ? "expr-yes\n" : "expr-no\n";
