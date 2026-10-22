<?php
// Constants: "the file declares or imports a namespaced constant of that name" scoping, using a
// fictitious global constant (TEST_CONST is never predefined, so any namespace below is free to
// declare its own without colliding with anything real).
namespace app_global {
    // no local declaration, no import: the bare name falls back to the global constant (rewritten)
    function f() { return TEST_CONST; }
}
namespace app_local {
    const TEST_CONST = 'app_local-value';
    // this namespace declares its own: the bare name resolves locally (never rewritten)
    function f() { return TEST_CONST; }
    // explicitly local (namespace\...) is never rewritten either, same value
    function g() { return namespace\TEST_CONST; }
}
namespace app_import {
    use const TEST_CONST; // imports the real global TEST_CONST (rewritten through the alias)
    function f() { return TEST_CONST; }
}
namespace app_import_alias {
    use const TEST_CONST as ALIASED;
    function f() { return ALIASED; }
}
namespace lib {
    const TEST_CONST = 'lib-value';
}
namespace app_import_other {
    use const lib\TEST_CONST; // imports a DIFFERENT namespace's own constant: never rewritten
    function f() { return TEST_CONST; }
}
namespace {
    echo app_global\f(), "\n";
    echo app_local\f(), "\n";
    echo app_local\g(), "\n";
    echo app_import\f(), "\n";
    echo app_import_alias\f(), "\n";
    echo app_import_other\f(), "\n";
}
