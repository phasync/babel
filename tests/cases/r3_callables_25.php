<?php
// invokable objects, static closures, bound closures pass through Runtime::fn untouched
echo (new class { function __invoke($x) { return "inv:$x"; } })('a'), "\n";
$o = new class { function __invoke() { return func_num_args(); } };
echo $o(1, 2, 3), "\n";
$s = static fn() => isset($this) ? 'this' : 'nothis';
echo $s(), "\n";
$c = function () { return get_class($this) . ':' . static::class; };
$b = Closure::bind($c, new Orig\Base, Orig\Base::class);
echo $b(), "\n";
$arr = ['inv' => $o];
echo $arr['inv'](1), "\n";
class R3cb25 {
    private function hidden() { return 'hidden'; }
    function run() {
        $f = [$this, 'hidden'];
        $g = Closure::fromCallable([$this, 'hidden']);
        $h = $this->hidden(...);
        return $f() . $g() . $h() . call_user_func([$this, 'hidden']) . call_user_func([self::class, 'who']);
    }
    static function who() { return '!'; }
}
echo (new R3cb25)->run(), "\n";
