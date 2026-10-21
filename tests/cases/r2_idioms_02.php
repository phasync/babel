<?php
namespace App\Command;

use Orig\Attr;
use Orig\Thing as Model;
use Orig;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class Route
{
    public function __construct(
        public string $path = '',
        public array $requirements = [],
        public array $defaults = [],
        public ?string $entity = null,
        public array $nested = [],
    ) {}
}

#[Attr(v: Model::class)]
#[Route('/things/{id}', requirements: ['id' => '\d+'], defaults: ['class' => Model::class, 'base' => Orig\Base::class], entity: \Orig\Thing::class)]
#[Route(path: '/other', nested: [new Attr(v: [Model::class, Orig\Err::class])])]
final class ShowThing
{
    #[Route('/m'), Attr(Orig\Contract::class)]
    public function __invoke(#[Attr(Model::class)] Model $thing): Model
    {
        return $thing;
    }
}

$rc = new \ReflectionClass(ShowThing::class);
foreach ($rc->getAttributes() as $a) {
    echo $a->getName(), ' ', json_encode($a->getArguments(), JSON_UNESCAPED_SLASHES), "\n";
}
$nested = $rc->getAttributes(Route::class)[1]->newInstance()->nested[0];
echo get_class($nested), ' ', json_encode($nested->v), "\n";
$m = $rc->getMethod('__invoke');
foreach ($m->getAttributes() as $a) {
    echo $a->getName(), ' ', json_encode($a->getArguments()), "\n";
}
$p = $m->getParameters()[0];
echo $p->getType(), ' ', $p->getAttributes()[0]->getName(), ' ', $p->getAttributes()[0]->getArguments()[0], "\n";
echo $m->getReturnType(), "\n";
echo (new ShowThing)(new Model)::class, "\n";
