<?php
namespace Cx;

#[\Attribute]
class At { function __construct(public string $f = '') {} }

const FILE_CONST = __FILE__;
const DIR_CONST = __dir__;

#[At(__FILE__)]
class K {
    const F = __FILE__ . ':' . __LINE__;
    const D = __Dir__;
    public string $p = __FILE__;
    public static $s = [__DIR__ => __LINE__];
    function m($a = __FILE__, $b = __DIR__ . '/x') {
        static $st = __FILE__;
        return [basename($a), $b, basename($st), fopen(__FILE__), basename(__FILE__)];
    }
}
enum E: string {
    case A = __FILE__;
    const D = __DIR__;
}
echo basename(FILE_CONST), ' ', basename(DIR_CONST), "\n";
echo basename(K::F), ' ', basename(K::D), ' ', basename((new K)->p), ' ', key(K::$s) === __DIR__ ? 'dir-ok' : 'dir-bad', "\n";
echo str_replace(__DIR__, '<DIR>', str_replace('\\/', '/', json_encode((new K)->m()))), "\n";
echo basename(E::A->value), ' ', E::D === __DIR__ ? 'ok' : 'bad', "\n";
echo basename((new \ReflectionClass(K::class))->getAttributes()[0]->newInstance()->f), "\n";
echo "__FILE__ in string, ", '__DIR__ single', " // __FILE__ comment\n"; # __DIR__
echo <<<T
heredoc __FILE__ __DIR__ eval('x') include 'y'
T . "\n";
