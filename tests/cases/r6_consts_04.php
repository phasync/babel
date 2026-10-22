<?php
// Constants: a qualified name (Foo\X) is resolved like PHP resolves it -- against this unit's
// non-const `use` imports for its first segment, else the current namespace -- and is never confused
// with the global map, which only ever matches a truly global, unqualified (or fully qualified) name.
namespace Foo {
    const TEST_CONST = 'foo-value';
}
namespace Consumer {
    use Foo;
    use Foo as F;
    function direct() { return \Foo\TEST_CONST; }
    function viaUse() { return Foo\TEST_CONST; }
    function viaAlias() { return F\TEST_CONST; }
}
namespace {
    echo Consumer\direct(), "\n";
    echo Consumer\viaUse(), "\n";
    echo Consumer\viaAlias(), "\n";
    // the global map entry is untouched by any of the above
    echo TEST_CONST, "\n";
}
