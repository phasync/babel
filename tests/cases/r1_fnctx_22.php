<?php
namespace ns;
interface I { public function fopen(); public static function sleep(); }
trait T { public function usleep() { return 1; } abstract public function file_get_contents(); }
enum E: int implements I {
    use T;
    case One = 1;
    public function fopen() { return 1; } public static function sleep() { return 2; }
    public function file_get_contents() { return 3; }
}
abstract class A { abstract protected function &stream_select(); public final static function curl_exec() {} }
$o = new class extends A { protected function &stream_select() { $x = 1; return $x; } };
$c = function () { return 1; };
$d = new class(function () { return 1; }) { public function __construct($f) {} public function strtoupper() {} };
echo fopen('a'), sleep(1), usleep(1), file_get_contents('x'), stream_select(), curl_exec(), strtoupper('x'), "\n";
