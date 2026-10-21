<?php
namespace evl;
use Orig\Thing;
use PDO;
echo Thing::class, "\n";
// imports do not carry into eval
eval('echo Thing::class, " ", PDO::class, " ", \Orig\Thing::class, " ", \PDO::class, " ", __NAMESPACE__, "|\n";');
eval('namespace ev2; use Orig\Base; use PDO; echo Base::class, " ", PDO::class, " ", Thing::class, "\n"; function q(PDO $p, Base $b) {} echo (new \ReflectionFunction("ev2\\\\q"))->getParameters()[0]->getType(), "\n";');
$x = 'Orig\Err';
eval('var_dump(is_a(new \Repl\Err, $x), is_a(new \Repl\Err, "Orig\\\\Err"), new \Repl\Err instanceof $x);');
file_put_contents(__DIR__ . '/r1_clsres_15_inc.php', '<?php
namespace incl;
use Orig\Contract;
echo Contract::class, " ", Thing::class, " ", \Orig\Thing::class, " ", __NAMESPACE__, "\n";
return fn(Contract $c): \Orig\Thing => new \Repl\Thing;
');
$f = include __DIR__ . '/r1_clsres_15_inc.php';
echo (new \ReflectionFunction($f))->getParameters()[0]->getType(), ' ', (new \ReflectionFunction($f))->getReturnType(), "\n";
unlink(__DIR__ . '/r1_clsres_15_inc.php');
