<?php
namespace App\Command;

use Orig\Attr as Autowire;
use Orig\{Thing, Base, Contract};

#[\Attribute]
final class AsCommand { public function __construct(public string $name, public ?string $description = null, public array $aliases = []) {} }

#[AsCommand(name: 'app:sync', description: Thing::X, aliases: [Base::class])]
final class SyncCommand extends Base implements Contract
{
    #[Autowire(Thing::class)]
    public const string SERVICE = Thing::class;

    public function __construct(
        #[Autowire(v: new Thing)] private readonly Thing $thing,
        #[Autowire([Base::class => Thing::class]), \SensitiveParameter] protected Base|Contract|null $base = null,
    ) {}

    #[Autowire]
    public function setThing(#[Autowire] Thing $t): static { return $this; }
}

enum Mode: string
{
    #[Autowire(Thing::class)] case Fast = 'fast';
    #[Autowire(v: Base::class)]
    case Slow = 'slow';
}

$cmd = new SyncCommand(new Thing);
$rc = new \ReflectionClass($cmd);
$a = $rc->getAttributes()[0];
echo $a->getName(), ' ', json_encode($a->getArguments()), "\n";
echo $rc->getReflectionConstant('SERVICE')->getAttributes()[0]->getName(), ' ', $rc->getReflectionConstant('SERVICE')->getAttributes()[0]->getArguments()[0], ' ', SyncCommand::SERVICE, "\n";
foreach ($rc->getConstructor()->getParameters() as $p) {
    foreach ($p->getAttributes() as $pa) {
        echo $p->getName(), ' ', $p->getType(), ' ', $pa->getName(), ' ', json_encode(array_combine(array_keys($pa->getArguments()), [...(function () use ($pa) { foreach ($pa->getArguments() as $v) yield is_object($v) ? get_class($v) : $v; })()])), "\n";
    }
}
$m = $rc->getMethod('setThing');
echo $m->getAttributes()[0]->getName(), ' ', $m->getParameters()[0]->getAttributes()[0]->getName(), ' ', $m->getParameters()[0]->getType(), "\n";
foreach ((new \ReflectionEnum(Mode::class))->getCases() as $c) {
    echo $c->getName(), ' ', $c->getAttributes()[0]->getName(), ' ', json_encode($c->getAttributes()[0]->getArguments()), "\n";
}
$f = #[Autowire(Thing::class)] static fn (#[Autowire] Thing $x): Thing => $x;
$g = #[Autowire] function (Base $b) use ($f): Base { return $b; };
echo (new \ReflectionFunction($f))->getAttributes()[0]->getArguments()[0], ' ', get_class($f(new Thing)), ' ', get_class($g(new Base)), "\n";
$anon = new #[Autowire(Base::class)] class(new Thing) extends Base { public function __construct(public Thing $t) {} };
echo (new \ReflectionObject($anon))->getAttributes()[0]->getArguments()[0], ' ', get_parent_class($anon), "\n";
