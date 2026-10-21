<?php
namespace MyComposer\Autoload;

final class ClassLoader
{
    private static ?\Closure $includeFile = null;
    private array $prefixes = [];

    public function __construct()
    {
        self::$includeFile = \Closure::bind(static function ($file) {
            include $file;
        }, null, null);
    }

    public function addPsr4(string $prefix, string $dir): void { $this->prefixes[$prefix] = $dir; }

    public function register(): void { spl_autoload_register([$this, 'loadClass'], true, true); }

    public function loadClass(string $class): ?bool
    {
        foreach ($this->prefixes as $prefix => $dir) {
            if (str_starts_with($class, $prefix)) {
                $file = $dir . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
                if (is_file($file)) {
                    (self::$includeFile)($file);
                    return true;
                }
            }
        }
        return null;
    }
}

$loader = new ClassLoader;
$loader->addPsr4('App\\', __DIR__ . '/fixtures/r2_psr4/');
$loader->register();
var_dump(class_exists('App\Models\User'), class_exists('Orig\Thing', false));
$u = new \App\Models\User;
echo get_parent_class($u), ' ', get_class($u->thing()), ' ', $u->io(), "\n";
echo str_replace(__DIR__, '', \App\Models\User::FILE), "\n";
$config = require __DIR__ . '/fixtures/r2_psr4/config.php';
echo $config['default'], ' ', implode(',', $config['models']), "\n";
var_dump($config["loader"]());
$cond = false;
$r = $cond ? include __DIR__ . '/nope.php' : (include __DIR__ . '/fixtures/r2_psr4/config.php')['default'];
echo $r, "\n";
