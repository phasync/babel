<?php
// enum methods returning static/self and using mapped types; enum constants in match
namespace s28;
use Orig\{Thing, Contract};
enum Mode: int implements Contract {
    case On = 1;
    case Off = 0;
    const DEFAULT = self::On;
    public static function from2(Thing|int $x): static { return is_int($x) ? self::from($x) : static::DEFAULT; }
    public function flip(): self { return match ($this) { self::On => self::Off, self::Off => self::On }; }
    public function thing(): ?Thing { return $this === self::On ? new Thing : null; }
    public static function list(Contract ...$m): mixed { return array_map(fn(Contract $c): string => $c->name, $m); }
}
echo Mode::from2(new Thing)->name, ' ', Mode::from2(0)->flip()->name, ' ', Mode::On->thing()::who(), "\n";
echo Mode::list(Mode::On, Mode::Off), ' ', \array_map(fn(Mode $m) => $m->name, Mode::cases())[1], "\n";
echo Mode::On instanceof Contract ? 'c' : '-', ' ', enum_exists(Mode::class) ? 'e' : '-', "\n";
