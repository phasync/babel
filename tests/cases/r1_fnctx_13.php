<?php
$x = ['HOOK:fopen' => 'found', 'k' => 'plain', 'HOOK:strtoupper' => 'up', 'HOOK:sleep' => 's'];
$o = new stdClass; $o->p = 'prop'; $o->fopen = 'ofopen';
echo "A {$x[fopen('a')]} B {$x['k']} C $x[k] D {$o->p} E $o->fopen\n";
echo <<<EOT
H1 {$x[fopen('a')]}
H2 {$x[strtoupper('b')]}-{$o->fopen}
H3 {$x[sleep(1)]}
EOT . "\n";
$fn = fn($v) => "<{$v}:" . sleep(1) . ">";
echo $fn('z'), "\n";
echo "{$x[\fopen('a')]} {$x[namespace\fopen('a')]}", "\n";
