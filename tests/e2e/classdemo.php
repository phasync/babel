<?php
// What a pass-through class map changes: run with and without boot.php (E2E_CLASSES=1) and compare.
$ao = new ArrayObject([1, 2]);
echo get_class($ao), "\n";
echo var_export($ao->getIterator() instanceof ArrayIterator, true), "\n";   // internal code creates \ArrayIterator
echo serialize(new ArrayObject([1])), "\n";
$u = unserialize('O:11:"ArrayObject":4:{i:0;i:0;i:1;a:0:{}i:2;a:0:{}i:3;N;}');
echo var_export($u instanceof ArrayObject, true), "\n";
function takes(ArrayIterator $it) { return iterator_count($it); }
try { echo takes((new ArrayObject([1, 2, 3]))->getIterator()), "\n"; } catch (TypeError $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
echo json_encode(class_parents(new SplStack())), "\n";
$cls = 'SplObjectStorage';
echo get_class(new $cls()), "\n";
echo var_export(is_a(new \SplObjectStorage(), 'SplObjectStorage'), true), "\n";
echo (new ReflectionClass('ArrayObject'))->isInternal() ? "internal\n" : "user\n";
