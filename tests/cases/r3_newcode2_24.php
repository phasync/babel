<?php
// PHP 8.4 member access on new without parentheses, with static, dynamic and string class names.
namespace App;
use Orig\Thing;
use Orig\Base;
$c = 'Orig\Base';
$o = new \stdClass; $o->c = 'Orig\Thing';
echo new Base()->name(), ' ', new Thing()::who(), ' ', new $c()->name(), ' ', new $o->c()::who(), ' ', new (\trim(' Orig\Thing '))()::X, "\n";
echo new class extends Base {}->name(), ' ', new ('Orig\Base')()->name(), ' ', \get_class(new $o->c), ' ', new Thing()::$p, ' ', new Thing()::class, "\n";
$f = fn () => new Base()->name(...);
echo $f()(), ' ', new \ArrayObject([1, 2])->count(), "\n";
