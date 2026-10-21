<?php
namespace s;
$o = new class { function m($x) { return "m$x"; } function sleep($x) { return "anon-sleep"; } };
$name = 'World';
echo "a {$o->m(sleep(1))} b {$o->sleep(fopen('x'))}\n";
echo <<<EOT
  heredoc {$o->m(strtoupper('q'))} sleep(1) {$o->sleep(usleep(3))}
  EOT . "\n";
echo <<<'EOT'
nowdoc sleep(1)
EOT, "\n";
echo "sleep(1) fopen('x')", 'usleep(1)', "\n";

