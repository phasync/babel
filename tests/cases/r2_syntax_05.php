<?php
// #[\Override], final typed class constants, enum constants and cases referencing mapped classes
namespace s05;
use Orig\Thing;
use Orig\Contract;
enum Suit: string implements Contract {
    case A = Thing::X;
    case B = 'b';
    const string ORIG = Thing::X;
    final public const Contract DEF = self::A;
    const ?Contract NONE = null;
    public static function pick(): static { return self::DEF; }
    public function cls(): string { return Thing::class; }
}
class P { public function who(Thing $t): string { return 'p'; } }
class K extends P {
    final public const Contract C = Suit::B;
    #[\Override]
    public function who(Thing $t): string { return $t::who(); }
}
echo Suit::A->value, ' ', Suit::ORIG, ' ', Suit::pick()->name, ' ', Suit::B->cls(), "\n";
echo (new K)->who(new Thing), ' ', K::C->name, "\n";
echo Suit::A instanceof Contract ? "contract\n" : "no\n";
echo (new \ReflectionClassConstant(Suit::class, 'DEF'))->getType(), "\n";
