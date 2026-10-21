<?php
namespace Foo;

use Orig;
use Orig as Z;
use Orig\Thing as Alias;
use PDO as Driver;
use PDO;
use function Orig\nothing;

// Orig is imported above, so Orig\Thing is the mapped class; Orig\Sub\Thing is not
function a(Orig\Thing $x) {}
function b(\Orig\Thing $x) {}
function c(Z\Thing $x, Alias $y, Driver $z, PDO $w, \PDO $v, namespace\PDO $u, \Foo\PDO $t) {}
function d(Orig\Sub\Thing $x, Z\Sub\Thing $y, Thing $z, \Foo\Thing $w, namespace\Thing $v): Base|Orig\Base {}
function e(Alias|Z\Base|(Z\Err&Z\Contract)|Orig\Attr $q) {}
foreach (['a', 'b', 'c', 'd', 'e'] as $f) {
    $rf = new \ReflectionFunction("Foo\\$f");
    echo $f, ': ';
    foreach ($rf->getParameters() as $p) echo $p->getType(), ' ';
    echo $rf->getReturnType(), "\n";
}
