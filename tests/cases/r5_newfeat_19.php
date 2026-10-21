<?php
// b"" / B"" / b<<< strings with interpolation in callee, class, key and value positions.
$f = fn() => 'strtoupper'; $c = 'Orig\Thing'; $u = 'upper';
echo b"{$f()('a')}", "\n";
echo B"x{$c::who()}y$u{$c::$p}", "\n";
echo b<<<EOT
  {$f()('b')} {$c::who()}
  EOT, "\n";
echo B<<<"EOT"
{$c::who()}
EOT . "\n";
echo b"strto$u"('c'), b"strto{$u}"('d'), b"strto${u}"('e'), "\n";
echo b"Orig\\Thing"::who(), B'Orig\Thing'::$p, "\n";
var_dump(b"{$f()}");
var_dump(b"{$c::who()}" === "Repl\\Thing");
$arr = [b"k{$c::who()}" => 1];
var_dump(array_keys($arr));
echo b"$c[0]{$c::who()}", "\n";
