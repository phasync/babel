<?php
namespace a;
// $o instanceof (expr) (laravel QueueFake: `$job instanceof ((string) $jobToQueue)`)
$c = 'Orig\Thing';
var_dump(new \Repl\Thing instanceof ($c));
var_dump(new \Repl\Thing instanceof ((string) $c));
