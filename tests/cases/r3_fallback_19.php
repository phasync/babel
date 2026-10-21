<?php
// first-class callables nested inside arrays / new / ternaries of parameter defaults are constant expressions
namespace App;
class Box { function __construct(public $f) {} }
function a($f = [usleep(...)]) { return $f[0](1); }
function b($f = new Box(fopen(...))) { return ($f->f)('x'); }
function c($f = true ? strtoupper(...) : null) { return $f('c'); }
function d($f = ['k' => [sleep(...)]]) { return $f['k'][0](1); }
$e = fn($f = [strtoupper(...)]) => $f[0]('e');
echo a(), ' ', b(), ' ', c(), ' ', d(), ' ', $e(), "\n";
