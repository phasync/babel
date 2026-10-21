<?php
// non strict: values PHP itself accepts or reports on
set_error_handler(function ($n, $m, $f, $l) { echo "W: $m @$l\n"; return true; });
class P { function __construct(private string $p) {} function __toString(): string { return $this->p; } }
try { var_dump(include new P(__DIR__ . '/fixtures/r1_inc_vars.php')); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(include null); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(include []); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(include_once 1.5); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(eval(null)); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(eval(new P('return 5;'))); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(eval(true)); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
echo "end\n";
