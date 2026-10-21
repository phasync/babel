<?php
namespace React;

use Orig\Err;
use Orig\Thing;

// Promise idioms: methods named catch/finally/then/match/list/new/include/fn.
final class Promise
{
    private array $log = [];
    public function __construct(private mixed $value = null, private ?\Throwable $error = null) {}
    public static function new(mixed $v = null): static { return new static($v); }
    public function then(callable $ok): static { try { return new static($ok($this->value)); } catch (\Throwable $e) { return new static(null, $e); } }
    public function catch(callable $fail): static { return $this->error ? new static($fail($this->error)) : $this; }
    public function finally(callable $f): static { $f(); return $this; }
    public function match(Thing|Err $x): string { return $x::class; }
    public function list(): array { return [$this->value]; }
    public function include(string $f): string { return 'include:' . $f; }
    public function fn(Thing ...$t): int { return count($t); }
    public function value(): mixed { return $this->value; }
}

$p = Promise::new(1)
    ->then(fn (int $v) => throw new Err("bad $v"))
    ->catch(function (Err $e): Thing { echo 'caught ', get_class($e), ' ', $e->getMessage(), "\n"; return new Thing; })
    ->finally(fn () => print("finally\n"))
    ?->catch(static fn (\Throwable $e) => strtoupper('never'));
echo get_class($p->value()), ' ', $p->match(new Thing), ' ', $p->match(new Err), "\n";
echo count($p->list()), ' ', $p->include('x.php'), ' ', $p->fn(new Thing, new Thing), ' ', strtoupper('z'), "\n";
$c = $p->catch(...);
echo get_class($c(fn () => 1)), ' ', Promise::new(...)()::class, "\n";
