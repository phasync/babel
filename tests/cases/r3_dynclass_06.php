<?php
// nullsafe chain ending in a static call inside "{...}" interpolation
$a = null;
echo "[{$a?->b::who()}]\n";
$o = new stdClass();
$o->b = 'Orig\Thing';
echo "[{$o?->b::who()}]\n";
echo <<<EOT
[{$a?->b?->c::who()}]

EOT;
