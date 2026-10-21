<?php
echo eval('namespace Q; use Orig\Thing; use function strtoupper as up; return Thing::who() . "|" . up("a") . "|" . __NAMESPACE__;'), "\n";
eval('function evf(PDO $p, ?Orig\Thing $t = null): ?\Orig\Base { return $t; } class EvC extends \Orig\Base implements Orig\Contract { public PDO|Orig\Err|null $p = null; const X = Orig\Thing::X; }');
$rf = new ReflectionFunction('evf');
echo $rf->getParameters()[0]->getType(), ' ', $rf->getParameters()[1]->getType(), ' ', $rf->getReturnType(), "\n";
$c = new EvC;
echo get_parent_class($c), ' ', EvC::X, ' ', (new ReflectionProperty('EvC', 'p'))->getType(), "\n";
$cn = 'Orig\\Thing';
$code = 'return [is_a($o, $cn), $o instanceof $cn, class_exists($cn), $cn::who(), (new $cn)::class, is_subclass_of("EvC", "Orig\\\\Base")];';
$o = new Orig\Thing;
echo json_encode(eval($code)), "\n";
echo json_encode(eval('try { throw new Orig\Err("e"); } catch (Orig\Err $e) { return get_class($e); }')), "\n";
echo eval('return (new class extends Orig\Base { })->name();'), "\n";
echo eval('return implode(",", array_keys(class_uses(new class { use Orig\Tr; })));'), "\n";
echo eval('return (new #[Orig\Attr(1)] class {})::class === 1 ? "" : (new ReflectionObject(new #[Orig\Attr(1)] class {}))->getAttributes()[0]->getName();'), "\n";
