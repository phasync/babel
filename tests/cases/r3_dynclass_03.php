<?php
// A parenthesised class expression directly after if (...) / while (...) / foreach (...)
if (true) ('Orig\Thing')::who();
if (true) echo ('Orig' . '\Thing')::who(), "\n";
foreach ([1] as $v) echo ('Orig' . '\Thing')::who(), "\n";
for ($i = 0; $i < 1; ++$i) echo ('Orig' . '\Thing')::X, "\n";
$n = 1;
while ($n--) echo ('Orig' . '\Thing')::$p, "\n";
