<?php
// scope-sensitive class-name functions (get_class_methods/get_class_vars) called through the shims
class R3cb11 {
    private $secret = 1;
    public $open = 2;
    private function p() {}
    public function q() {}
    public function run() {
        $a = [$this];
        echo implode(',', get_class_methods(...$a)), "\n";
        $f = 'get_class_methods';
        echo implode(',', $f($this)), "\n";
        echo implode(',', call_user_func('get_class_methods', $this)), "\n";
        echo implode(',', array_keys(get_class_vars(...[self::class]))), "\n";
        $g = get_class_vars(...);
        echo implode(',', array_keys($g(self::class))), "\n";
    }
}
(new R3cb11)->run();
