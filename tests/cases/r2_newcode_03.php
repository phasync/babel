<?php
// A named argument called function/fn must not make the next '(' a parameter list.
function g($function = 0, $fn = 0) { return 'g'; }
echo g(function: 1); var_dump(fopen('x', 'r'));
echo g(fn: 1); var_dump(strtoupper('a'));
