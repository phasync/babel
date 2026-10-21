<?php
// non-string eval arguments
class S { public $n = 0; function __toString(): string { ++$this->n; return 'echo strtoupper("s"), "\n";'; } }
$s = new S;
eval($s);
echo $s->n, "\n";
$vals = [5, 1.5, true, false, null, [1], new stdClass, STDIN];
foreach ($vals as $i => $v) {
    try {
        $r = eval($v);
        echo $i, ': ', var_export($r, true), "\n";
    } catch (Throwable $e) {
        echo $i, ': ', get_class($e), ': ', $e->getMessage(), "\n";
    }
}
$g = (function () { yield 1; })();
try { eval($g); } catch (Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
enum E: string { case A = 'echo 1;'; }
try { eval(E::A); } catch (Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { eval(E::A->value); echo "\n"; } catch (Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
