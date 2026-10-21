<?php
// fallback calls inside string interpolation, heredoc and nowdoc
namespace App;
$a = ['HOOK:strtoupper' => 'key-hit', 'local' => 'local-hit'];
echo "{$a[strtoupper('k')]}\n";
echo <<<TXT
  heredoc {$a[strtoupper('h')]} and "{$a[fopen('x') === 'HOOK:fopen' ? 'local' : 'none']}"
  TXT;
echo "\n";
echo <<<'NOW'
  nowdoc {$a[strtoupper('n')]}
  NOW;
echo "\n";
function strtoupper($s) { return 'local'; }
