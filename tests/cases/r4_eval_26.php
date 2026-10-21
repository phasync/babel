<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
eval('declare(strict_types=1); function sf(int $x) { return $x; } try { sf("1"); } catch (TypeError $e) { echo "strict\n"; }');
eval('function nf(int $x) { return $x; } var_dump(nf("1"));');
eval("\n\n" . 'declare(strict_types=1); echo strlen(fopen("q")), "\n";');
eval('/* lead */ declare(strict_types=1); namespace N; echo fopen("q"), "\n";');
