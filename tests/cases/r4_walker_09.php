<?php
class T { public static $p = 'T'; public $c = 'T'; static function who() { return 'T'; }
  function list() { return 'strrev'; } function if() { return 'strrev'; } static function new() { return 'T'; } function match() { return $this; }
  static function print() { return 'strrev'; } function array() { return 'strrev'; } function fn() { return 'strrev'; } function static() { return 'T'; }
  static function class() { return 'T'; } function include() { return 'strrev'; } function function() { return 'strrev'; } function exit() { return 'T'; }
  function test() { return [$this->list()('ab'), static::new()::who(), self::print()('cd'), $this->match()->static()::who()]; } }
$s = 'strrev'; $c = 'T'; $o = new T; $x = 1;
if ($x) ($s)('1a'); echo "\n";
if ($x) { } ($s)('2a'); echo "\n";
if ($x): ($s)('3a'); endif; echo "\n";
if ($x) echo ($s)('4a'), "\n"; elseif ($x) ($s)('x'); else ($s)('x');
while ($x--) ($s)('5a'); echo "\n";
for ($i = 0; $i < 1; $i++) ($c)::who(); echo "\n";
foreach ([1] as $v) echo ($s)('6a'), "\n";
switch (1) { case 1: echo ($s)('7a'), "\n"; }
declare(ticks=1) echo ($s)('8a'), "\n";
try { throw new Exception; } catch (Exception $e) { echo ($s)('9a'), "\n"; }
try { } finally { } echo ($s)('10a'), "\n";
function q() { } echo ($s)('11a'), "\n";
$cl = function () { }; echo ($s)('12a'), "\n";
class U { } echo ($c)::who(), "\n";
echo $o->list()('13a'), $o->if()('b'), T::new()::who(), $o->match()->match()->static()::who(), "\n";
echo T::print()('14a'), $o->array()('b'), $o->fn()('c'), T::class()::who(), $o->include()('d'), $o->function()('e'), $o->exit()::who(), "\n";
echo implode(',', $o->test()), "\n";
echo T::{'who'}(), "\n";
do ($s)('15a'); while (0); echo "\n";
{ ($s)('16a'); } echo "\n";
{ } ($s)('17a'); echo "\n";
$y = [($s)('18a'), ($c)::who() => ($s)('b'), ...[($s)('c')]]; echo implode(',', $y), "\n";
echo $x ?? ($s)('19a'), "\n";
echo isset($x) ? ($s)('20a') : ($c)::who(), "\n";
echo 1 + strlen(($s)('21a')), "\n";
echo match(true) { default => ($s)('22a') }, "\n";
echo (int) ($s)('23') + 1, "\n";
echo ~strlen(($s)('24')), "\n";
return print(($s)('25a')) . "\n";
