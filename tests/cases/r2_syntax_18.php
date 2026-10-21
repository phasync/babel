<?php
// enum, readonly, match, never, fn, new etc. used as identifiers in legal positions
namespace s18\enum\match;
use Orig\Thing;
function enum(Thing $t): Thing { return $t; }
function readonly(): string { return fopen('x'); }
class C {
    const match = 'm', readonly = 'r', fn = 'f', new = 'n', enum = 'e', class_ = 'c';
    public function match(Thing $t): never { throw new \Orig\Err($t::who()); }
    public static function new(): static { return new static; }
    public function readonly(?Thing $t = null): ?Thing { return $t; }
    public function enum(): string { return strtoupper('x'); }
    public function fopen(): string { return 'method'; }
    public static function list(Thing ...$t): int { return count($t); }
}
echo enum(new Thing)::who(), ' ', namespace\readonly(), "\n";
echo C::match, C::readonly, C::fn, C::new, C::enum, "\n";
try { C::new()->match(new Thing); } catch (\Orig\Err $e) { echo get_class($e), ' ', $e->getMessage(), "\n"; }
echo C::new()->readonly(new Thing)::who(), ' ', C::new()->enum(), ' ', C::new()->fopen(), ' ', C::list(new Thing), "\n";
echo \s18\enum\match\enum(new Thing)::who(), ' ', namespace\readonly(), "\n";
