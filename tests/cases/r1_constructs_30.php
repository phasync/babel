<?php
$r = include __DIR__ . '/fixtures/r1_inc_cls.php';
$c = new R1\Cls\C;
echo get_parent_class($c), ' ', implode(',', class_implements($c)), "\n";
echo R1\Cls\C::who(), "\n";
$m = new ReflectionMethod($c, 'm');
echo $m->getParameters()[0]->getType(), ' | ', $m->getParameters()[1]->getType(), ' | ', $m->getReturnType(), "\n";
echo (new ReflectionProperty($c, 't'))->getType(), "\n";
echo (new ReflectionClass($c))->getAttributes()[0]->getName(), "\n";
echo $c->viaThis(), "\n";
echo R1\Cls\typed(new Repl\Thing), "\n";
$orig = unserialize('O:10:"Orig\\Thing":0:{}');
echo get_class($orig), "\n";
try { R1\Cls\typed($orig); } catch (TypeError $e) { echo "TypeError\n"; }
try { $c->m($orig); } catch (TypeError $e) { echo "TypeError2\n"; }
var_dump($c->m(new Repl\PDO));
