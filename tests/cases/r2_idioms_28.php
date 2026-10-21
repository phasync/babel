<?php
namespace Gen;

// Code generators take keyword-named arguments: extends:, implements:, function:.
function makeClass(string $name, ?string $extends = null, array $implements = [], ?string $body = null): string
{
    return "$name<$extends>[" . implode(',', $implements) . "]{" . $body . "}";
}
function register(callable $function, string $label): string { return $label . '=' . $function('x'); }

echo makeClass('A', extends: 'Base', body: strtoupper('b')), "\n";
echo makeClass('B', implements: ['I'], body: file_get_contents('x')), "\n";
echo register(function: 'trim', label: strtoupper('lbl')), "\n";
echo strtoupper(usleep(1)), "\n";
