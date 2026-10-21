<?php
namespace App;
use Orig\Thing, Orig\Contract;

interface HasLabel { public function label(): string; }
enum Suit: string implements HasLabel, Contract {
    case Hearts = 'h';
    case List = 'l';
    case Default = 'd';
    case PDO = 'p';
    case fopen = 'f';
    const Thing = self::PDO;
    const string NEW = 'n';
    public function label(): string { return strtoupper($this->name) . match ($this) {
        self::Hearts, self::List => fopen('m'),
        self::PDO => Thing::who(),
        default => static::class,
    }; }
    public static function new(): static { return self::fopen; }
    public static function fopen(): string { return 'static-fopen'; }
    public function list(Thing ...$things): int { return \count($things); }
}
final readonly class R {
    public function __construct(public Thing $t, public ?Contract $c = null) {}
    public function with(Thing $t): static { return clone($this, ['t' => $t]); }
}
foreach (Suit::cases() as $c) {
    echo $c->name, '=', $c->label(), "\n";
}
echo Suit::Thing->name, ' ', Suit::NEW, ' ', Suit::new()->value, ' ', Suit::fopen(), ' ', Suit::List->list(new Thing, new Thing), "\n";
echo Suit::from('p')->label(), ' ', Suit::Hearts instanceof Contract ? 'C' : '-', "\n";
$r = new R(new Thing);
echo get_class($r->with(new Thing)->t), "\n";
echo (new \ReflectionProperty(R::class, 't'))->getType(), "\n";
