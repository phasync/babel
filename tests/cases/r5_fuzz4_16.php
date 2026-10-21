<?php
// complete operands on the right of '|>' that are computed callees: a nullsafe chain with a static
// access, a match expression, an interpolated string, a silenced variable
namespace NA;
class K { public static $fns = ['f' => 'strtoupper']; }
class H { public $ko; public function __construct() { $this->ko = new K; } }
$h = new H; $f = 'strtoupper';
var_dump('ab' |> $h?->ko::$fns['f']);
var_dump('ab' |> match (1) { 1 => 'strtoupper' });
var_dump('ab' |> "{$f}");
var_dump('ab' |> "$f");
var_dump('ab' |> @$f);
var_dump('ab' |> $h->ko::$fns['f']);
