<?php
declare(strict_types=1);

namespace Tests\Unit;

use Orig\Err;
use Orig\Thing;
use PDO;

#[\Attribute(\Attribute::TARGET_METHOD)]
final class DataProvider { public function __construct(public string $method) {} }

abstract class TestCase
{
    private ?string $expected = null;

    protected function createMock(string $class): object
    {
        return (new \ReflectionClass($class))->newInstanceWithoutConstructor();
    }

    protected function expectException(string $class): void
    {
        $this->expected = $class;
    }

    protected function assertInstanceOf(string $expected, mixed $actual, string $message = ''): void
    {
        echo $actual instanceof $expected ? "ok" : "FAIL", " instanceof $expected\n";
    }

    public function run(string $method): void
    {
        $this->expected = null;
        $rm = new \ReflectionMethod($this, $method);
        $sets = [[]];
        foreach ($rm->getAttributes(DataProvider::class) as $a) {
            $sets = static::{$a->newInstance()->method}();
        }
        foreach ($sets as $name => $args) {
            try {
                $this->$method(...$args);
                echo $method, " $name passed\n";
            } catch (\Throwable $e) {
                $ok = $this->expected !== null && is_a($e, $this->expected);
                echo $method, " $name ", $ok ? 'expected ' : 'unexpected ', get_class($e), "\n";
            }
        }
    }
}

final class ThingTest extends TestCase
{
    public static function classes(): iterable
    {
        yield 'thing' => [Thing::class];
        yield 'pdo' => [PDO::class, 'sqlite::memory:'];
        yield 'err' => [Err::class];
    }

    #[DataProvider('classes')]
    public function testMake(string $class, string ...$args): void
    {
        $this->assertInstanceOf($class, $this->createMock($class));
        $this->assertInstanceOf(Thing::class, $this->createMock($class));
    }

    public function testThrows(): void
    {
        $this->expectException(Err::class);
        throw new Err('boom');
    }

    public function testThrowsOther(): void
    {
        $this->expectException(Err::class);
        throw new \Exception('other');
    }

    public function testMock(): void
    {
        $pdo = $this->createMock(PDO::class);
        $this->assertInstanceOf(PDO::class, $pdo);
        $this->assertInstanceOf('PDO', $pdo);
    }
}

$t = new ThingTest;
foreach (['testMake', 'testThrows', 'testThrowsOther', 'testMock'] as $m) {
    $t->run($m);
}
