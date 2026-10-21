<?php
// PHP 8.4: new static()/new self()/new parent() followed by '::' (the object's class)
class P { public static function who() { return 'P'; } }
class K extends P {
    public static function who() { return 'K'; }
    const C = 'k';
    public $c = 'Orig\Thing';
    public static function t() {
        return [new static()::who(), new self()::who(), new parent()::who(), new static()::C, new static()->c::who()];
    }
}
echo implode(',', K::t()), "\n";
