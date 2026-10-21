<?php
namespace Views;

use Orig\Thing;

final class App { public function make(string $c): object { return new $c; } public function up(string $s): string { return strtoupper($s); } }
$app = new App;
$map = [Thing::class => 'mapped-key', 'Orig\Thing' => 'orig-key'];
$fns = ['up' => strtoupper(...), 'sleep' => sleep(...)];
echo "made: {$app->make(Thing::class)::who()} | {$map[Thing::class]} | {$map['Orig\Thing']} | {$fns['up']('a')} | {$app->up('b')}\n";
echo <<<HTML
<div class="{$app->make(\Orig\Base::class)->name()}">{$fns['sleep'](1)} {$map[Thing::class]}</div>
HTML;
echo "\n", <<<'NOW'
{$app->make(Thing::class)} fopen('x') new Thing
NOW;
echo "\n";
