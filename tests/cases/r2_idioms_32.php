<?php
namespace App\Providers;

use Closure;
use Orig\{Thing, Base, Contract};
use PDO;

final class Container
{
    private array $bindings = [];
    private array $contextual = [];
    private ?string $building = null;
    private ?array $when = null;
    private ?string $need = null;

    public function bind(string $abstract, Closure|string|null $concrete = null): static { $this->bindings[$abstract] = $concrete ?? $abstract; return $this; }
    public function when(array|string $concrete): static { $this->when = (array) $concrete; return $this; }
    public function needs(string $abstract): static { $this->need = $abstract; return $this; }
    public function give(mixed $impl): void { foreach ($this->when as $c) { $this->contextual[$c][$this->need] = $impl; } }
    public function make(string $abstract): object
    {
        $concrete = $this->bindings[$abstract] ?? $abstract;
        if ($concrete instanceof Closure) {
            return $concrete($this);
        }
        $ctor = (new \ReflectionClass($concrete))->getConstructor();
        $args = [];
        foreach ($ctor?->getParameters() ?? [] as $p) {
            $t = $p->getType()?->getName();
            $given = $this->contextual[$concrete][$t] ?? null;
            $args[] = $given instanceof Closure ? $given($this) : $this->make($given ?? $t);
        }
        return new $concrete(...$args);
    }
}

final class Service
{
    public function __construct(public readonly PDO $db, public readonly Contract $c) {}
}

abstract class ServiceProvider { public function __construct(protected Container $app) {} abstract public function register(): void; }

final class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [Contract::class => Thing::class];

    public function register(): void
    {
        foreach ($this->bindings as $k => $v) {
            $this->app->bind($k, fn (Container $app): Contract => new class extends Base implements Contract {});
        }
        $this->app->when([Service::class])->needs(PDO::class)->give(fn (Container $app): PDO => new PDO('sqlite::memory:'));
        $this->app->bind(Base::class, static fn (): Base => new Base());
    }
}

$app = new Container;
(new AppServiceProvider($app))->register();
$s = $app->make(Service::class);
echo get_class($s->db), ' ', get_parent_class($s->c), ' ', $s->c instanceof Contract ? 'contract' : 'no', "\n";
echo get_class($app->make(Base::class)), ' ', implode(',', array_keys((new AppServiceProvider($app))->bindings)), "\n";
