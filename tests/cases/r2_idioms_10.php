<?php
namespace Traits;

use Orig\Tr;
use Orig\Thing;
use PDO;

trait UsesDb
{
    protected static ?PDO $shared = null;
    abstract protected function connection(): PDO;
    abstract public static function factory(Thing ...$things): static;
    abstract public function &ref(?PDO &$pdo = null): ?Thing;

    public function db(): PDO
    {
        return static::$shared ??= $this->connection();
    }
}

trait Greets
{
    public function who() { return 'Greets'; }
}

class Repo
{
    use UsesDb, Tr, Greets {
        Tr::who insteadof Greets;
        Greets::who as protected greetsWho;
        Tr::who as public trWho;
    }
    private ?Thing $t = null;

    protected function connection(): PDO { return new PDO('sqlite::memory:'); }
    public static function factory(Thing ...$things): static { $r = new static; $r->t = $things[0] ?? null; return $r; }
    public function &ref(?PDO &$pdo = null): ?Thing { return $this->t; }
    public function g() { return $this->greetsWho(); }
}

$r = Repo::factory(new Thing);
echo get_class($r->db()), ' ', $r->db() === $r->db() ? 'same' : 'diff', "\n";
echo $r->who(), ' ', $r->trWho(), ' ', $r->g(), "\n";
echo get_class($r->ref()), "\n";
echo implode(',', class_uses($r)), "\n";
echo implode(',', class_uses(Repo::class)), "\n";
var_dump(trait_exists(Tr::class), trait_exists('Orig\Tr'), method_exists(Tr::class, 'who'));
$m = new \ReflectionMethod(UsesDb::class, 'factory');
echo $m->getParameters()[0]->getType(), ' ', (new \ReflectionMethod(UsesDb::class, 'ref'))->getReturnType(), "\n";
