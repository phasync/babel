<?php
// Nullsafe enum property fetches in constant expressions (8.2) must not be wrapped; next to them, run time chains are.
enum E: string { case A = 'Orig\Thing'; case B = 'x';
  const C = self::A?->value;
  const D = [self::A?->name, \Orig\Thing::X, self::A?->value];
  public function cls() { return $this->value; } }
class K { const P = E::A?->value; public $q = E::A?->name; public static $s = E::B?->value;
  public function f($x = E::A?->value, $y = E::A?->value) { static $st = E::A?->name; return [$x, $st]; } }
#[Orig\Attr(E::A?->value)] class AT {}
var_dump(E::C, E::D, K::P, (new K)->q, K::$s, (new K)->f());
$at = (new ReflectionClass('AT'))->getAttributes()[0]->newInstance(); var_dump(get_class($at), $at->v);
$e = E::A;
var_dump($e?->value::who());
var_dump($e?->cls()::who());
var_dump(E::A?->value::who());
var_dump(E::tryFrom('zz')?->value::who());
var_dump(E::tryFrom('Orig\Thing')?->cls()::X);
