<?php
// Magic-constant keywords are valid named-argument labels (semi-reserved identifiers).
function loc(string $__DIR__ = '', string $__FILE__ = '', int $__LINE__ = 0): string
{
    return basename($__DIR__) . '|' . basename($__FILE__) . '|' . $__LINE__;
}
echo loc(__DIR__: __DIR__, __FILE__: __FILE__, __LINE__: __LINE__), "\n";
