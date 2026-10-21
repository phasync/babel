<?php
// Every reserved word as a named-argument label: calls, nested calls, new, static calls, attributes, after comments.
namespace App;
function f(...$a) { \ksort($a); return \json_encode($a); }
class V { public array $a; public function __construct(...$a) { \ksort($a); $this->a = $a; } public static function s(...$a) { return f(...$a); } }
#[\Attribute(\Attribute::TARGET_ALL)] class At { public array $a; public function __construct(...$a) { \ksort($a); $this->a = $a; } }
echo f(include: 1, include_once: 2, require: 3, require_once: 4, eval: 5), "\n";
echo f(function: 1, fn: 2, class: 3, extends: 4, implements: 5, use: 6, new: 7, static: 8), "\n";
echo f(__FILE__: 1, __DIR__: 2, __COMPILER_HALT_OFFSET__: 3, __LINE__: 4, __CLASS__: 5, namespace: 6), "\n";
echo f(instanceof: 1, insteadof: 2, match: 3, enum: 4, const: 5, catch: 6, list: 7, array: 8), "\n";
echo f(1, /* c */ include: f(eval: 1), // x
  require: __DIR__ === 'x' ? 1 : 2), "\n";
echo f(public: 1, private: 2, protected: 3, abstract: 4, final: 5, readonly: 6, var: 7, exit: 8, die: 9, print: 10, echo: 11), "\n";
echo \json_encode((new V(new: (new V(class: 1))->a, include: [\basename(__FILE__) => 1], fn: 2))->a), "\n";
echo V::s(static: 1, __DIR__: V::s(__FILE__: __LINE__)), "\n";
#[At(include: 1, __FILE__: 2, eval: 3, new: new At(class: 4))]
function g(#[At(__DIR__: 5, fn: 6)] $p = new V(include: 7, function: 8)) { return $p->a; }
$r = new \ReflectionFunction('App\g');
echo \json_encode($r->getAttributes()[0]->getArguments()['new']->a), ' ', \json_encode($r->getParameters()[0]->getAttributes()[0]->getArguments()), ' ', \json_encode(g()), "\n";
echo __COMPILER_HALT_OFFSET__ > 0 ? 'ok' : 'bad', ' ', f(__COMPILER_HALT_OFFSET__: __COMPILER_HALT_OFFSET__ > 0), "\n";
__halt_compiler();data
