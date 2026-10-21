<?php
// calls of the result of a nullsafe chain with static links (the chain ends at the computed call)
class H { public $k = 'H'; public $c = 'Orig\Thing'; public static $f = 'strtoupper';
  public static function mk() { return new H; } public static function fo() { return 'fopen'; } public static function arr() { return ['strtoupper']; } }
$h = new H; $z = null; $x = ['HOOK:fopen' => 'sleep'];
echo ($h?->k)::fo()('a'), ' ', ($h?->k)::arr()[0]('b'), ' ', (($h?->k)::$f)('c'), ' ', ($h?->k::$f)('d'), "\n";
echo $x[$h?->k::fo()()](), ' ', new ($h?->k::mk()->k)()->c::who(), ' ', "{$h?->k::fo()}"('e'), "\n";
foreach (['($z?->k)::fo()("a")', '$z?->k::arr()[0]', '($z?->k::$f)("d")', '$z?->k::fo()::fo()'] as $code) {
    try { var_dump(eval("return $code;")); } catch (\Error $e) { echo $e->getMessage(), "\n"; }
}
