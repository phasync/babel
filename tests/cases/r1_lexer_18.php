<?php
use Orig\Thing;
$t = new Thing;
$n = 'Orig\Thing';
echo "a{$t::who()}b\n";
echo "a{$n::who()}b\n";
echo <<<EOT
heredoc {$t::who()} and {$n::$p}
EOT;
echo "\n";
