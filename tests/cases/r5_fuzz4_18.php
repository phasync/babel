<?php
// a big random program of the round-5 differential fuzzer (nullsafe chains with static access, pipes,
// computed callees, unpacking, namespace fallback in closures and evals), eval'd and translated
// with its own map: Orig\K => Repl\K, ofn => rfn (the originals return BAD)
require __DIR__ . '/fixtures/r5_fuzz4_rt.php';
phasync\Babel\Runtime::configure(new phasync\Babel\Babel(['ofn' => 'rfn', 'oref' => 'rref', 'ocmp' => 'rcmp'], ['Orig\K' => 'Repl\K']));
$__src = implode('', file(__DIR__ . '/fixtures/r5_fuzz4_big18.txt'));
eval('?>' . $__src);
