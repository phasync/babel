<?php
// Interpolation shapes with a dynamic class
$c = 'Orig\Thing';
$o = new stdClass();
$o->c = 'Orig\Thing';
$o->in = $o;
$a = ['k' => 'Orig\Thing', 'n' => ['k' => 'Orig\Thing']];
echo "{$c::who()}|{$c::$p}|{$o->c::who()}|{$o->in->c::$p}|{$a['k']::who()}|{$a['n']['k']::who()}\n";
echo "{$c::who()}{$c::who()}\n";
echo "x{$c::who()}y{$o?->c::who()}z\n";
echo "{$c::who("{$c::who()}")}\n";
echo <<<EOT
  a {$c::who()} b {$o->c::$p}
  EOT;
echo "\n";
printf("%s\n", "{$c::$p}");
