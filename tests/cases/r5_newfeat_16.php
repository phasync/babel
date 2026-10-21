<?php
// Interpolated strings (also b"", nested calls) in callee, class, new, is_a and first-class callable positions.
$f = fn() => 'upper';
$g = fn() => 'Thing';
$u = 'upper';
echo "strto{$f()}"('a'), "\n";
echo "strto$u"('b'), "\n";
echo "Orig\\{$g()}"::who(), "\n";
echo b"Orig\\{$g()}"::$p, "\n";
echo ("Orig\\{$g()}")::who(), "\n";
echo ("strto{$f()}")('c'), "\n";
echo ["strto{$f()}"][0]('d'), "\n";
echo ["Orig\\{$g()}", 'who'](), "\n";
echo "{$f()}" |> 'strrev', "\n";
echo (new ("Orig\\{$g()}"))::class, "\n";
var_dump(new ("Orig\\{$g()}") instanceof Repl\Thing);
var_dump(is_a("Orig\\{$g()}", "Orig\\{$g()}", true));
echo `echo strto{$f()}`;
$x = new ArrayObject(["strto{$f()}"]);
echo $x[0]('e'), "\n";
echo "strto{$f()}"(...)('f'), "\n";
echo "Orig\\{$g()}"::who(...)(), "\n";
