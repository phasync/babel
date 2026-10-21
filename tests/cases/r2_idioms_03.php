<?php
namespace App\Entity;

use Orig\Thing;
use Orig\Base;

/**
 * @ORM\Entity(repositoryClass="Orig\Thing")
 * @ORM\Table(name="things")
 * @see Thing::class, new Thing(), fopen('x'), PDO::ATTR_ERRMODE
 * @method static Thing find(int $id)
 */
class Item extends Base
{
    /**
     * @ORM\Column(type="string") @var Thing
     * @ORM\ManyToOne(targetEntity=Thing::class)
     */
    public ?Thing $thing = null; // new Thing; fopen(); /* Base::class */

    /** @param Thing $t  @return Thing|null  {@see \Orig\Thing::who()} */
    public function setThing(/* Thing */ ?Thing /* Base */ $t): ?/** Thing */Thing
    {
        # fopen('x'); Thing::who()
        return $this->thing = $t;
    }
}

$r = new \ReflectionClass(Item::class);
echo $r->getDocComment(), "\n";
echo $r->getProperty('thing')->getDocComment(), "\n";
echo $r->getProperty('thing')->getType(), "\n";
echo $r->getMethod('setThing')->getDocComment(), "\n";
echo $r->getMethod('setThing')->getReturnType(), "\n";
echo $r->getParentClass()->getName(), "\n";
echo (new Item)->setThing(new Thing)::class, "\n";
echo (new Item)->name(), "\n";
