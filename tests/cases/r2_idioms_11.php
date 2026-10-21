<?php
namespace Match;

use Orig\{Thing, Base, Contract, Err};

function kind(mixed $x): string
{
    return match (true) {
        $x instanceof Thing, $x instanceof Base => 'model:' . $x::class,
        $x instanceof Contract && !$x instanceof Err => 'contract',
        $x instanceof Err || $x instanceof \PDO => 'err-or-pdo',
        is_string($x) && is_a($x, Base::class, true) => 'base-name',
        is_string($x) && is_subclass_of($x, \Exception::class) => 'exc-name',
        get_class((object) $x) === Thing::class => 'never',
        default => get_debug_type($x),
    };
}

$items = [new Thing, new Base, new class implements Contract {}, new Err, new \PDO('x'), 'Orig\Base', Err::class, 'Orig\Err', 3,
    unserialize('O:10:"Orig\\Thing":0:{}')];
foreach ($items as $i) {
    echo kind($i), "\n";
}
$o = new Thing;
var_dump(get_class($o) === Thing::class, $o::class === 'Orig\Thing', $o::class == \Orig\Thing::class, $o instanceof $o);
$cls = Thing::class;
var_dump($o instanceof $cls, !$o instanceof Base, (new Base) instanceof Base and $o instanceof Thing);
