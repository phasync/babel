<?php
// scope-reading functions through the run time check of a polyfill that is not taken
namespace App;
if (\PHP_INT_SIZE === 1) {
    function constant($n) { return 'App:constant'; }
    function defined($n) { return 'App:defined'; }
    function get_class_methods($c) { return ['App:gcm']; }
    function get_class_vars($c) { return ['App:gcv' => 1]; }
    function method_exists($o, $m) { return 'App:me'; }
}
class Box {
    const SECRET = 'box-secret';
    private $hidden = 1;
    private function priv() {}
    public function pub() {}
    static function probe() {
        return constant('self::SECRET') . ' ' . var_export(defined('static::SECRET'), true) . ' '
            . implode(',', get_class_methods(self::class)) . ' ' . implode(',', array_keys(get_class_vars('App\Box'))) . ' '
            . constant('Orig\Thing::X') . ' ' . var_export(method_exists('Orig\Thing', 'who'), true);
    }
}
echo Box::probe(), "\n";
echo implode(',', get_class_methods('App\Box')), "\n";
