<?php
set_error_handler(function ($n, $m, $f, $l) { echo "W: ", preg_replace('~^(include|require)(_once)?\(\): ~', '', $m), " @$l\n"; return true; });
try { include __DIR__ . '/fixtures/r1_syntax.php'; } catch (ParseError $e) { echo 'ParseError: ', $e->getMessage(), ' @', $e->getLine(), "\n"; }
echo include __DIR__ . '/fixtures/r1_localfn.php', "\n";
try { var_dump(include 'data://text/plain;base64,' . base64_encode('<?php return fopen(1);')); } catch (Throwable $e) { echo get_class($e), "\n"; }
try { var_dump(include 'php://memory'); } catch (Throwable $e) { echo get_class($e), "\n"; }
try { var_dump(include 'http://127.0.0.1:1/x.php'); } catch (Throwable $e) { echo get_class($e), "\n"; }
echo "end\n";
