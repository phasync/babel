<?php
namespace Gen;

use Orig\Thing;
use Orig\Base;
use Orig\Contract;

abstract class Model extends Base implements Contract
{
    protected static array $booted = [];

    public static function make(mixed ...$attrs): static { return new static(...$attrs); }
    public static function query(): self { return static::make(); }
    public static function boot(): void { static::$booted[static::class] = true; }
    public function newInstance(): static { return new (static::class); }
    public function cloneAs(string $cls): Base|Contract { return new $cls; }
}
final class User extends Model {}

function classes(): \Generator {
    yield Thing::class;
    yield Base::class => User::class;
    $sent = yield from inner();
    yield 'sent' => $sent;
    return new Thing;
}
function inner(): iterable {
    $x = yield \Orig\Err::class;
    yield Contract::class => $x instanceof Thing;
    return $x;
}

$g = classes();
for ($g->current(); $g->valid(); ) {
    [$k, $v] = [$g->key(), $g->current()];
    echo is_int($k) ? '#' : $k, ' => ', is_string($v) ? $v : get_debug_type($v), "\n";
    $v === 'Repl\Err' ? $g->send(new Thing) : $g->next();
}
echo get_class($g->getReturn()), "\n";

$u = User::make();
User::boot();
echo get_class($u), ' ', get_class(User::query()), ' ', get_class($u->newInstance()), ' ', get_class($u->cloneAs('Orig\Base')), "\n";
var_dump($u instanceof Base, $u instanceof Contract, $u instanceof Model);
echo $u->name(), "\n";
