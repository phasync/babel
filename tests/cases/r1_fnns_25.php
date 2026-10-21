<?php
namespace db;
$rc = (new \ReflectionClass(\ReflectionClass::class))->newInstanceWithoutConstructor();
$rc->__construct('PDO');
$real = $rc->newInstanceWithoutConstructor();
$fake = new \Repl\PDO;
$names = ['PDO', '\PDO', 'pdo'];
foreach ([$real, $fake] as $o) {
    echo get_class($o), ': ';
    echo is_a($o, 'PDO') ? 'Y' : 'N', \is_a($o, '\PDO') ? 'Y' : 'N', is_a($o, $names[2]) ? 'Y' : 'N', is_a($o, \PDO::class) ? 'Y' : 'N';
    echo is_a(class: 'PDO', object_or_class: $o) ? 'Y' : 'N', is_a(object_or_class: $o, class: 'PDO') ? 'Y' : 'N';
    echo is_subclass_of($o, 'PDO') ? 'Y' : 'N', method_exists($o, 'prepare') ? 'Y' : 'N', class_exists('PDO') ? 'Y' : 'N', "\n";
}
echo get_parent_class(new class extends \PDO { function __construct() {} }), "\n";
