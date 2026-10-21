<?php
// unpacking something that is not iterable into a class-name / callable function: the same TypeError
// as without the tool, and an undefined variable still warns (also for by-reference parameters)
function t($c) { try { var_dump($c()); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; } }
t(function () { $five = 5; return is_a(...$five); });
t(function () { return class_exists(...null); });
t(function () { return is_a(...$undef); });
t(function () { usort(...$undef); });
t(function () { $s = 'str'; usort(...$s); });
t(function () { usort(...$undef); return array_key_exists('undef', get_defined_vars()); });
