<?php
// Unpacking a value that is not iterable into a class-name / callable function: PHP throws TypeError "Only arrays and Traversables can be unpacked".
$o = new stdClass; $o->p = null; $o->q = 5;
try { var_dump(is_a(...$o->p)); } catch (Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(class_exists(...$o->q)); } catch (Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
$n = 'str';
try { var_dump(usort(...$n)); } catch (Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(array_filter([1], ...$n)); } catch (Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
