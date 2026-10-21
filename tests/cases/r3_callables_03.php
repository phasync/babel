<?php
// callables held in static properties and class constants
class R3cb03 {
    public static $cb = 'sleep';
    public static $map = ['k' => 'fopen'];
    const CB = 'usleep';
}
echo (R3cb03::$cb)(1), "\n";
echo R3cb03::$map['k']('x'), "\n";
echo (R3cb03::CB)(1), "\n";
