<?php
// r3 corpus: only a callee of the token form `$v(...)` / `$v[..](...)` is wrapped in Runtime::fn(). A parenthesised
// variable ($f)(...) / ($o['k'])(...) (guzzle's `($options['on_stats'])($stats)`, psr7's `($callable)(...$args)`) and
// any other computed callee - ($this->cb)(...), $this->cbs['k'](...), static::$s['k'](...), f()(...),
// $x->getCallable()(...) - is not, so a mapped function name arriving there is not redirected.
class K
{
    public $cb = 'sleep';
    public $cbs = ['k' => 'sleep'];
    public static $s = ['k' => 'sleep'];
    public function run() { return [($this->cb)(0), $this->cbs['k'](0), static::$s['k'](0)]; }
}
function pick() { return 'sleep'; }
$f = 'sleep';
$o = ['k' => 'sleep'];
echo implode(' ', (new K)->run()), ' ', pick()(0), ' ', ($f)(0), ' ', ($o['k'])(0), "\n";
