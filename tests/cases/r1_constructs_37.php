<?php
// the translated copy must not leak its cache location into anything the program can observe
class Z { function f() { return new Exception('x'); } }
function bt() { return debug_backtrace()[0]['file']; }
echo basename(bt()), "\n";
echo basename((new Z)->f()->getFile()), "\n";
echo basename((new ReflectionClass('Z'))->getFileName()), "\n";
echo basename((new ReflectionFunction('bt'))->getFileName()), "\n";
echo (new Z)->f()->getFile() === __FILE__ ? "same\n" : "different\n";
echo in_array(__FILE__, get_included_files(), true) ? "listed\n" : "not-listed\n";
