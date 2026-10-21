<?php
namespace pdo\test;
use PDO;
use ReflectionClass;
$r = new PDO('x');
$real = \Pdo\Sqlite::connect('sqlite::memory:');
$j = fn($v) => var_export($v, true);
echo get_class($r), ' ', get_class($real), "\n";
echo $j(is_a($r, 'PDO')), $j(is_a($r, '\PDO')), $j(is_a($r, "pdo")), $j(is_a($real, 'PDO')), $j($r instanceof PDO), $j($real instanceof PDO), $j($real instanceof \PDO), "\n";
echo $j(is_a('Repl\PDO', 'PDO', true)), $j(is_subclass_of($r, 'PDO')), $j(class_exists('PDO')), $j(class_exists('pdo', false)), $j(method_exists('PDO', '__construct')), "\n";
echo (new ReflectionClass('PDO'))->name, ' ', (new ReflectionClass($r))->name, ' ', (new ReflectionClass(PDO::class))->name, ' ', (new \ReflectionClass('\pdo'))->name, "\n";
$c = 'PDO'; $c2 = '\PDO'; $o = new $c('y'); $o2 = new $c2;
echo get_class($o), get_class($o2), $j($o instanceof $c), $j($real instanceof $c), $j(is_a($real, $c)), "\n";
function takes(PDO $p): PDO { return $p; }
echo get_class(takes($r)), "\n";
try { takes($real); } catch (\TypeError $e) { echo 'TypeError: ', preg_replace('/, called in.*/', '', $e->getMessage()), "\n"; }
$arr = ['PDO', 'pdo\test\X'];
foreach ($arr as $n) { echo is_a($r, $n, true) ? 'y' : 'n'; } echo "\n";
