<?php
enum Kw: string {
    case Include = 'i';
    case Eval = 'e';
    case Require = 'r';
}
echo Kw::Include->value, Kw::Eval->value, Kw::Require->value, ' ', Kw::from('e')->name, "\n";
