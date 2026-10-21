<?php
use Orig\Err;
use Orig\Thing;
use Orig\Attr;
use Orig\Base;

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }

function thrower($e) { throw $e; }
foreach ([new Repl\Err('r'), orig('Orig\Err'), new RuntimeException('rt')] as $ex) {
    try {
        try { thrower($ex); }
        catch (Err | LogicException $e) { echo 'A:', get_class($e), "\n"; }
        catch (\Orig\Err) { echo "unreachable\n"; }
    } catch (Throwable) { echo 'outer:', get_class($ex), "\n"; }
}
try { throw new Err('x'); } catch (\Orig\Err $e) { echo 'FQ catch ', get_class($e), "\n"; }
try { thrower(new Repl\Err('y')); } catch (RuntimeException | Err $e) { echo 'union second ', $e->getMessage(), "\n"; }
try { thrower(new Repl\Err('z')); } catch (Err) { echo "no var\n"; } finally { echo "fin\n"; }
try { thrower(new Repl\Err('z')); } catch (Exception $e) { echo 'by Exception ', get_class($e), "\n"; }

#[Attr] #[Attr(1), Attr(v: Thing::class)]
class WithAttrs {
    #[Attr(new Thing)] public $p;
    #[Attr(Thing::X)] const C = 1;
    #[Attr, \Orig\Attr(2)]
    public function m(#[Attr(3)] Thing $t, #[\Orig\Attr] #[Attr(Base::class)] $u = null) {}
}
enum En { #[Attr('case')] case A; case B; }
$f = #[Attr('closure')] fn(Thing $t) => 1;
$g = #[Attr] static function () {};
$rc = new ReflectionClass(WithAttrs::class);
foreach ($rc->getAttributes() as $a) {
    echo $a->getName(), ' ', json_encode(array_keys($a->getArguments())), ' ';
    echo json_encode($a->getArguments()), "\n";
}
foreach ((new ReflectionProperty(WithAttrs::class, 'p'))->getAttributes() as $a) echo $a->getName(), ' ', get_class($a->getArguments()[0]), "\n";
foreach ((new ReflectionClassConstant(WithAttrs::class, 'C'))->getAttributes() as $a) echo $a->getName(), ' ', $a->getArguments()[0], "\n";
$m = new ReflectionMethod(WithAttrs::class, 'm');
foreach ($m->getAttributes() as $a) echo $a->getName(), ' ';
echo "\n";
foreach ($m->getParameters() as $p) { foreach ($p->getAttributes() as $a) echo $p->getName(), ':', $a->getName(), '(', json_encode($a->getArguments()), ') '; }
echo "\n";
echo (new ReflectionEnumUnitCase(En::class, 'A'))->getAttributes()[0]->getName(), "\n";
echo (new ReflectionFunction($f))->getAttributes()[0]->getName(), ' ', (new ReflectionFunction($g))->getAttributes()[0]->getName(), "\n";
