<?php
namespace Ser;

use Orig\Thing;
use Orig\Base;

final class Envelope
{
    public function __construct(public object $payload, public string $type = Thing::class) {}

    public function __serialize(): array
    {
        return ['type' => $this->payload::class, 'expect' => $this->type, 'is' => $this->payload instanceof Thing];
    }

    public function __unserialize(array $data): void
    {
        $this->type = $data['type'];
        $this->payload = (new \ReflectionClass($data['type']))->newInstanceArgs([]);
        echo 'unser ', $data['type'], ' expect=', $data['expect'], ' is=', var_export($data['is'], true), ' now=', get_class($this->payload), "\n";
    }

    public static function __set_state(array $a): static
    {
        return new static(new $a['type'], $a['type']);
    }
}

$e = new Envelope(new Thing);
$s = serialize($e);
echo $s, "\n";
$back = unserialize($s);
var_dump($back->payload instanceof Thing);
$u = unserialize($s, ['allowed_classes' => [Envelope::class, Thing::class]]);
echo get_class($u->payload), "\n";

$r = new \ReflectionClass(new Base);
$b = $r->newInstanceArgs();
echo get_class($b), ' ', $r->getName(), "\n";
$r2 = new \ReflectionClass(objectOrClass: 'Orig\Base');
echo $r2->newInstance()->name(), "\n";
eval('$x = ' . var_export(new Envelope((object) [], Base::class), true) . ';');
echo get_class($x), ' ', get_class($x->payload), "\n";
eval('$y = \Ser\Envelope::__set_state(array("type" => "Orig\\\\Base"));');
echo get_class($y->payload), "\n";
