<?php
namespace App;
$cls = 'Orig\Thing';
$f = 'strtoupper';
$g = 'trim';
echo <<<EOT
    A {$cls::who()} B
      {$f('x')} C {$g}
    D {$cls::$p} E {$g(" q ")}
    EOT;
echo "\n";
echo <<<A
  x {$f(<<<B
     inner {$cls::$p}
     B)} y {$g(<<<'C'
        now {$cls::$p}
       C)}
  A, "\n";
echo "a {$g("b {$cls::$p} {$g(" {$cls::who()} ")}")} c\n";
echo `echo {$cls::$p}`;
echo <<<"Q"
 {$g(sprintf('%s', <<<R
   R
 ))}|{${'g'}}
 Q;
echo "\n", __LINE__, "\n";
