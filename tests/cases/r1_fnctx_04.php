<?php
function f(int $include = 1, int $eval = 2, int $require = 3) { return "$include,$eval,$require"; }
echo f(eval: 9), ' ', f(require: 7, include: 5), "\n";
