<?php
namespace app;
use Orig\Thing;
use Orig\{Base, Err};
use PDO;
function f(Thing $t, ?Base $b = null, PDO|Thing|null $x = null): Thing { return $t; }
class K extends Base { public Thing $p; public function m(): ?Thing { return null; } }
echo Thing::who(), ' ', Thing::X, ' ', Thing::class, ' ', (new K)->name(), "\n";
try { throw new Err('x'); } catch (Err $e) { echo get_class($e), "\n"; }
echo (new \ReflectionFunction('app\f'))->getParameters()[0]->getType(), "\n";
echo new \ReflectionProperty(K::class, 'p') ->getType(), "\n";
var_dump(new \Repl\Thing instanceof Thing);
var_dump(is_a(new \Repl\Thing, 'Orig\Thing'), is_a(new \Repl\Thing, '\Orig\Thing'), class_exists('PDO'));
$n = 'Orig\Thing'; var_dump(is_a(new \Repl\Thing, $n)); $o = new \Repl\Thing; var_dump(method_exists($o, 'who'), (new \ReflectionClass('Orig\Thing'))->getName());
echo get_class(new $n), ' ', $n::who(), "\n"; var_dump($o instanceof $n);
