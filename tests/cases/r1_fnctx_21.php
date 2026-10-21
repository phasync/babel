<?php
class K {
    public static function extends(...$a) { return 'extends:' . implode(',', $a); }
    public static function implements(...$a) { return 'implements:' . implode(',', $a); }
    public function insteadof(...$a) { return 'insteadof:' . implode(',', $a); }
}
echo K::extends(fopen('x')), "\n";
echo K::implements(sleep(1), strtoupper('a')), "\n";
echo (new K)->insteadof(fopen('x')), ' ', K::extends(usleep(1)), "\n";
