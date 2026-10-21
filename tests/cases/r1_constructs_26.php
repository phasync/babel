<?php
enum E: string {
    case Include = 'inc';
    case Eval = 'ev';
    case Require = 'req';
    public static function pick(): self { return self::Eval; }
}
echo E::Include->value, E::pick()->name, E::from('req')->name, count(E::cases()), "\n";
echo fopen('after'), "\n";
