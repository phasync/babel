<?php
namespace Avis;

use Orig\Thing;
use Orig\Base;
use Orig\Contract;

interface HasThing
{
    public Thing $thing { get; }
}

abstract class Model implements HasThing
{
    private(set) Thing $thing;
    protected(set) ?Base $base = null;
    public private(set) Base|Thing|null $either = null;
    public protected(set) readonly Thing $ro;
    abstract public Contract|Thing $abs { get; }
    final public Thing $fin {
        set(Thing|Base $value) { $this->fin = $value instanceof Thing ? $value : new Thing; }
    }

    public function __construct(private(set) Thing|Base $promoted = new Base)
    {
        $this->thing = new Thing;
        $this->ro = new Thing;
        $this->base = new Base;
        $this->fin = new Base;
    }
}

final class User extends Model
{
    public Contract|Thing $abs { get => new Thing; }
}

$u = new User;
echo get_class($u->thing), ' ', get_class($u->base), ' ', get_class($u->ro), ' ', get_class($u->abs), ' ', get_class($u->fin), ' ', get_class($u->promoted), "\n";
try { $u->thing = new Thing; } catch (\Error $e) { echo $e->getMessage(), "\n"; }
$rc = new \ReflectionClass(Model::class);
foreach (['thing', 'base', 'either', 'ro', 'abs', 'fin', 'promoted'] as $p) {
    echo $p, ': ', $rc->getProperty($p)->getType(), "\n";
}
echo (new \ReflectionProperty(HasThing::class, 'thing'))->getType(), "\n";
