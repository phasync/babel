<?php

// Stand-ins for the class-name functions, used by translated code when the position of the class
// argument is unknown at translate time (first-class callable is_a(...), partial application
// is_a($x, ?)). They map the class argument and forward the call. No strict_types: like the
// internal function called directly, they coerce scalar arguments.

namespace phasync\Babel\Shim;

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
