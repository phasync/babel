<?php
namespace Domain;

use Orig\Contract;
use Orig\Thing;
use Orig as O;

interface HasModel extends Contract
{
    const MODEL = Thing::class;
    public const array MODELS = [Thing::class, O\Base::class, 'k' => \Orig\Err::class];
    const string BASE = O\Base::class;
    public function model(): Thing|string;
}

enum Status: string implements HasModel
{
    case Active = 'active';
    case Archived = O\Thing::X;
    const DEFAULT = self::Active;
    const Status ALT = Status::Archived;
    const LOOKUP = [Thing::class => self::Active, O\Err::class => self::Archived];

    public function model(): Thing|string { return $this === self::Active ? new Thing : self::MODEL; }
    public static function fromClass(string $cls): self { return self::LOOKUP[$cls] ?? self::DEFAULT; }
}

final readonly class Money implements Contract
{
    public function __construct(public int $amount, public Thing|O\Base $owner = new Thing, public Status $status = Status::DEFAULT) {}
    public function with(int $amount): static { return new static($amount, $this->owner, $this->status); }
}

echo Status::MODEL, ' ', implode(',', Status::MODELS), ' ', Status::BASE, "\n";
echo Status::Archived->value, ' ', Status::ALT->name, "\n";
echo get_class(Status::Active->model()), ' ', Status::Archived->model(), "\n";
echo Status::fromClass(Thing::class)->name, ' ', Status::fromClass('Repl\Err')->name, ' ', Status::fromClass('x')->name, "\n";
var_dump(Status::Active instanceof Contract, Status::Active instanceof HasModel);
$m = (new Money(5))->with(7);
echo $m->amount, ' ', get_class($m->owner), ' ', $m->status->name, "\n";
try { $m->amount = 1; } catch (\Error $e) { echo get_class($e), "\n"; }
echo implode(',', class_implements(Status::Active)), "\n";
echo implode(',', array_keys(class_implements(Money::class))), "\n";
$rc = new \ReflectionClassConstant(HasModel::class, 'MODELS');
echo $rc->getType(), "\n";
var_dump(enum_exists(Status::class), interface_exists('Orig\Contract'), interface_exists(HasModel::class));
