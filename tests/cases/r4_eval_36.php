<?php
class S { function __toString(): string { throw new Exception('ts'); } }
try {
    eval(new S);
} catch (Exception $e) {
    $f = $e->getTrace()[0];
    echo $e->getMessage(), ' ', $e->getLine(), ' ', basename($f['file']), ':', $f['line'], ' ', $f['class'] ?? '', $f['type'] ?? '', $f['function'], "\n";
    $f = $e->getTrace()[1] ?? [];
    echo ($f['class'] ?? '') . ($f['function'] ?? '-'), "\n";
}
