<?php
// A 'use const __COMPILER_HALT_OFFSET__ as H' alias only applies in its own namespace block.
namespace A {
    use const __COMPILER_HALT_OFFSET__ as H;
    echo H > 0 ? 'A:ok' : 'A:bad', "\n";
}
namespace B {
    const H = 5;
    echo H, "\n";
    function H() { return 'fnH'; }
    echo H(), "\n";
    class H { const X = 'clsH'; }
    echo H::X, ' ', \get_class(new H), "\n";
}
namespace {
    echo __COMPILER_HALT_OFFSET__ > 0 ? 'G:ok' : 'G:bad', "\n";
}
__halt_compiler();data
