<?php
// 'use' imports appearing after code: names before the import resolve to the namespace
namespace s21;
echo Thing::class, ' ', class_exists(Thing::class) ? 'y' : 'n', "\n";
function before() { return Thing::class; }
use Orig\Thing;
echo Thing::class, ' ', Thing::who(), ' ', before(), "\n";
echo fopen('x'), "\n";
use function Hook\fopen_alt as fopen;
echo fopen('x'), "\n";
