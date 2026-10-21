<?php
namespace App\Support;

use Orig\Thing;
use Orig\Contract;
use Closure;

class Container
{
    protected static ?Container $instance = null;
    /** @var array<string, Closure> */
    protected array $bindings = [];
    protected array $instances = [];

    public static function getInstance(): static
    {
        return static::$instance ??= new static;
    }

    public function bind(string $abstract, Closure|string|null $concrete = null, bool $shared = false): void
    {
        $concrete ??= $abstract;
        if (!$concrete instanceof Closure) {
            $concrete = fn (Container $c, array $p = []) => $c->build($concrete, $p);
        }
        $this->bindings[$abstract] = compact('concrete', 'shared');
    }

    public function singleton(string $abstract, Closure|string|null $concrete = null): void
    {
        $this->bind($abstract, $concrete, true);
    }

    public function make(string $abstract, array $parameters = []): mixed
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }
        $concrete = $this->bindings[$abstract]['concrete'] ?? $abstract;
        $object = $concrete instanceof Closure ? $concrete($this, $parameters) : $this->build($concrete, $parameters);
        if ($this->bindings[$abstract]['shared'] ?? false) {
            $this->instances[$abstract] = $object;
        }
        return $object;
    }

    public function build(string $concrete, array $args = []): object
    {
        if (!class_exists($concrete)) {
            throw new \RuntimeException("Target [$concrete] is not instantiable.");
        }
        return new $concrete(...$args);
    }
}

$app = Container::getInstance();
$app->bind(Thing::class);
echo get_class($app->make(Thing::class)), "\n";
echo get_class($app->make('Orig\Thing')), "\n";
$app->singleton(Contract::class, fn () => new class implements Contract {});
var_dump($app->make(Contract::class) === $app->make(Contract::class));
var_dump($app->make(Contract::class) instanceof Contract);
var_dump(Container::getInstance() === $app);
echo get_class($app->make(\Orig\Base::class)), "\n";
