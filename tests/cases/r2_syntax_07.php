<?php
// attributes on closures and arrow functions, static fn with mapped types
namespace s07;
use Orig\Thing;
use Orig\Attr;
$f = #[Attr(Thing::class)] static fn(Thing $t): Thing => $t;
$g = #[Attr(new Thing)] #[\Orig\Attr] static function (?Thing $t = null): ?Thing { return $t ?? new Thing; };
echo $f(new Thing)::who(), ' ', $g()::who(), "\n";
$r = new \ReflectionFunction($f);
echo $r->getAttributes()[0]->getName(), ' ', $r->getAttributes()[0]->getArguments()[0], ' ', $r->getReturnType(), "\n";
$r = new \ReflectionFunction($g);
echo count($r->getAttributes(Attr::class)), ' ', get_class($r->getAttributes()[0]->getArguments()[0]), "\n";
$h = [static fn(Thing ...$ts): array => $ts, #[Attr] fn((Thing&\Countable)|null $x = null) => $x];
echo count($h[0](new Thing, new Thing)), "\n";
echo (new \ReflectionFunction($h[1]))->getParameters()[0]->getType(), "\n";
