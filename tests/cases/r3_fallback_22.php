<?php
// methods named like mapped functions in classes, interfaces, traits, enums and anonymous classes are not declarations
namespace App;
interface I { function strtoupper($s); }
trait T { function usleep($n) { return 'method'; } }
enum E { case A; function sleep($n) { return 'method'; } }
abstract class K { abstract function file_get_contents($f); }
$o = new readonly class { function fopen($x) { return 'method'; } };
function take($o) { return $o; }
take(new class([1]) extends \ArrayObject implements \Countable { function curl_exec($h) { return 'method'; } });
take(new #[\AllowDynamicProperties] class { function stream_select() { return 'method'; } });
$f = function () { return new class { public function array_map() {} }; };
echo fopen('x'), ' ', strtoupper('x'), ' ', usleep(1), ' ', sleep(1), ' ', file_get_contents('f'), ' ', curl_exec(1), "\n";
$r = null;
echo stream_select($r, $r, $r, 0), ' ', array_map(null, []), "\n";
