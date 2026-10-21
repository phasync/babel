<?php
namespace App\Db;

class Db extends \PDO
{
    private static array $pool = [];

    public function __construct(string $dsn, ?string $user = null, ?string $pass = null, array $options = [])
    {
        parent::__construct($dsn, $user, $pass, $options + ['errmode' => 'exception']);
        echo 'parent is ', get_parent_class($this), "\n";
    }

    public static function connect(string $dsn): static
    {
        return self::$pool[$dsn] ??= new static($dsn);
    }

    public function query2(string $sql): never
    {
        throw new \PDOException("cannot run: $sql");
    }
}

function open(): \PDO|false
{
    try {
        $db = Db::connect('sqlite::memory:');
        var_dump($db instanceof \PDO, $db instanceof Db, Db::connect('sqlite::memory:') === $db);
        echo get_parent_class(Db::class), ' ', implode(',', class_parents($db)), "\n";
        $db->query2('SELECT 1');
    } catch (\PDOException $e) {
        echo get_class($e), ': ', $e->getMessage(), "\n";
        return $db;
    } catch (\Exception | \Error $e) {
        echo "other\n";
    }
    return false;
}
echo get_class(open()), "\n";
echo \PDOException::class, ' ', \PDO::class, ' ', namespace\Db::class, "\n";
var_dump(is_subclass_of(Db::class, 'PDO'), is_subclass_of(Db::class, '\PDO'), class_exists('\PDO'));
