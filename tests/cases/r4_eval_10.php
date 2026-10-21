<?php
function t($f) { try { var_dump($f()); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; } }
t(fn() => 'eval'('return 1;'));
t(function () { $f = 'eval'; return $f('return 1;'); });
t(fn() => call_user_func('eval', 'return 1;'));
t(fn() => ('eval')('return 1;'));
t(fn() => array_map('eval', ['return 1;']));
t(fn() => is_callable('eval'));
t(fn() => function_exists('eval'));
t(fn() => \Closure::fromCallable('eval'));
t(function () { $a = [1, 2]; return usort($a, "eval"); });
