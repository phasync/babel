<?php
namespace App;
use Orig\Thing;
use Orig\Contract;
interface HasT { const T = Thing::class; }
enum Suit: string implements Contract, HasT {
    case H = 'h';
    case S = 's';
    const D = self::H;
    const C = Thing::class;
    public static function make(Thing $t = new Thing): Thing { return $t; }
    public function m(): static { return $this; }
}
echo Suit::C, ' ', Suit::T, ' ', get_class(Suit::make()), "\n";
$ci = class_implements(Suit::class); sort($ci); echo implode(',', $ci), "\n";
echo (new \ReflectionMethod(Suit::class, 'make'))->getParameters()[0]->getType(), "\n";
readonly class RO { public function __construct(public Thing $t, public ?Contract $c = null) {} }
$r = new RO(new Thing);
echo get_class($r->t), "\n";
try { $r->t = new Thing; } catch (\Error $e) { echo get_class($e), "\n"; }
function nv(): never { throw new \Exception('x'); }
echo (new \ReflectionFunction('App\nv'))->getReturnType(), "\n";
class P { public function __construct(private readonly Thing&Contract $x = new Thing) {} }
