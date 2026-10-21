<?php

declare(strict_types=1);

// The shims of src/shims.php for code with strict_types=1: there a first-class callable of an
// internal function (is_a(...)) checks scalar arguments strictly.

namespace phasync\Babel\Shim\Strict;

use phasync\Babel\Runtime;

function is_a(mixed ...$args): bool { return \is_a(...Runtime::spread('is_a', 0, null, $args)); }
function is_subclass_of(mixed ...$args): bool { return \is_subclass_of(...Runtime::spread('is_subclass_of', 0, null, $args)); }
function class_exists(mixed ...$args): bool { return \class_exists(...Runtime::spread('class_exists', 0, null, $args)); }
function interface_exists(mixed ...$args): bool { return \interface_exists(...Runtime::spread('interface_exists', 0, null, $args)); }
function trait_exists(mixed ...$args): bool { return \trait_exists(...Runtime::spread('trait_exists', 0, null, $args)); }
function enum_exists(mixed ...$args): bool { return \enum_exists(...Runtime::spread('enum_exists', 0, null, $args)); }
function method_exists(mixed ...$args): bool { return \method_exists(...Runtime::spread('method_exists', 0, null, $args)); }
function property_exists(mixed ...$args): bool { return \property_exists(...Runtime::spread('property_exists', 0, null, $args)); }
function class_implements(mixed ...$args): array|false { return \class_implements(...Runtime::spread('class_implements', 0, null, $args)); }
function class_parents(mixed ...$args): array|false { return \class_parents(...Runtime::spread('class_parents', 0, null, $args)); }
function class_uses(mixed ...$args): array|false { return \class_uses(...Runtime::spread('class_uses', 0, null, $args)); }
