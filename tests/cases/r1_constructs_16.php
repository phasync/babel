<?php
declare(strict_types=1);
set_error_handler(function ($n, $m, $f, $l) { echo "W: $m @$l\n"; return true; });
class P { function __construct(private string $p) {} function __toString(): string { return $this->p; } }
$f = __DIR__ . '/fixtures/r1_inc_vars.php';
try { var_dump(include new P($f)); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(include 5); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(include null); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(include $undefined); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(eval(null)); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(eval(42)); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(eval(new P("return 5;"))); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(eval([])); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
echo "end\n";
