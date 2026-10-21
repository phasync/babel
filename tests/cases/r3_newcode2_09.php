<?php
// include operands holding closures, arrow fns with return types, match, ternaries and nested includes.
$d = __DIR__ . '/fixtures/';
echo include (function () use ($d): string { include __DIR__ . '/fixtures/r3_newcode2_a.php'; return $d . 'r3_newcode2_b.php'; })(), "\n";
echo include (static fn (string $x): string => $d . $x)('r3_newcode2_a.php'), "\n";
echo include match (true) { \is_dir($d) => $d . 'r3_newcode2_b.php', default => 'nope' }, "\n";
echo include \is_dir($d) ? (fn (): string => $d . 'r3_newcode2_a.php')() : $d . 'r3_newcode2_b.php', "\n";
$r = [include $d . 'r3_newcode2_a.php' => 1, 'k' => require $d . 'r3_newcode2_b.php'];
echo \json_encode($r), "\n";
$f = fn () => include $d . 'r3_newcode2_a.php';
echo $f(), "\n";
echo \implode(',', \array_filter([1], fn ($v): bool => (bool) include $GLOBALS['d'] . 'r3_newcode2_b.php')), "\n";
$g = function ($p) { return require $p; };
echo $g($d . 'r3_newcode2_a.php') . (include_once $d . 'r3_newcode2_b.php'), "\n";
echo include (new class { public function p(): string { return __DIR__ . '/fixtures/r3_newcode2_b.php'; } })->p(), "\n";
