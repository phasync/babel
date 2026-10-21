<?php
// PHP 8.4: `new class {...}()` calls the new anonymous object; the '()' is not a parenthesised expression after a block.
echo new class { function __invoke() { return 'strtoupper'; } }()('a'), "\n";
$r = new class { function __invoke() { return 'Orig\Thing'; } }()::who();
echo $r, "\n";
echo new class implements ArrayAccess { function offsetGet($o): mixed { return 'strtoupper'; } function offsetExists($o): bool { return true; }
  function offsetSet($o, $v): void {} function offsetUnset($o): void {} }[0]('b'), "\n";
