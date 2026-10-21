<?php
// attributes with nested brackets on closures used as callable / class-name arguments and callees
namespace N;
use Orig\Attr;
use Orig\Thing;
$a = [3, 1, 2];
usort($a, #[Attr([1, [2, ['#[x]']]])] static fn($x, $y): int => $x <=> $y);
echo implode(',', $a), "\n";
$r = \call_user_func(#[Attr(new Thing), \Orig\Attr(Thing::class)] function () { $g = 'fopen'; return $g('x'); });
echo $r, "\n";
echo (#[Attr] fn() => 'strtoupper')()('y'), "\n";
echo (#[Attr(['k' => [1]])] static function () { return 'Orig\Thing'; })()::who(), "\n";
$o = new #[Attr([[]])] class { public $c = 'Orig\Thing'; };
echo $o->c::who(), "\n";
$rf = new \ReflectionFunction(#[Attr([1, [2]])] fn() => 1);
echo $rf->getAttributes()[0]->getName(), ' ', json_encode($rf->getAttributes()[0]->getArguments()), "\n";
echo is_a(#[Attr] fn() => 1, 'Closure') ? 'closure' : 'no', "\n";
