<?php
return [
    'default' => \PDO::class,
    'models' => [App\Models\User::class, Orig\Thing::class],
    'loader' => fn () => require_once __DIR__ . '/Models/User.php',
];
