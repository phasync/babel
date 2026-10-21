<?php
NAMESPACE   ws
    ;
USE
    Orig\Thing /* c */ AS /* c2 */ T # c3
    ,
    // c4
    Orig\Base
    AS B
    ;
Use Orig\{
    Err   AS E,
    /* x */ Attr,
};
use PDO
  as Db;
FUNCTION f(T $t, B $b, E $e, Attr $a, Db $d)
: T { return $t; }
echo T::class, B::class, E::class, Attr::class, Db::class, namespace\T::class, "\n";
foreach ((new \ReflectionFunction('ws\f'))->getParameters() as $p) { echo $p->getType(), ' '; }
echo (new \ReflectionFunction('ws\f'))->getReturnType(), "\n";
echo \IS_A(new \Repl\Thing, 'Orig\Thing') ? 'y' : 'n', "\n";
