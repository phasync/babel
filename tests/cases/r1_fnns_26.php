<?php
namespace nm;
$rc = (new \ReflectionClass(\ReflectionClass::class))->newInstanceWithoutConstructor();
$rc->__construct('PDO');
$real = $rc->newInstanceWithoutConstructor();
$fake = new \Repl\PDO;
foreach ([$real, $fake] as $o) {
    echo get_class($o), ': ';
    echo is_a(class: 'PDO', object_or_class: $o) ? 'Y' : 'N';
    echo (new \ReflectionClass(objectOrClass: 'PDO'))->getName(), ' ';
    echo method_exists(object_or_class: 'PDO', method: 'prepare') ? 'Y' : 'N', "\n";
}
