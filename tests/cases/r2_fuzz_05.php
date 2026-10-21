<?php
// Binary-prefixed string literals (b'...', B"...") are ordinary strings: as class-name literals
// they name the same class as without the prefix.
namespace App;
echo (new \ReflectionClass(b'Orig\Thing'))->getName(), "\n";
echo (new \ReflectionClass(B"Orig\\Thing"))->getName(), "\n";
echo \is_a(new \Repl\Thing, b'Orig\Thing') ? "y\n" : "n\n";
echo \class_exists(B'Orig\Thing') ? "y\n" : "n\n";
echo \get_parent_class(b'Orig\Err'), "\n";
