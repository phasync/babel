<?php
// A class constant used as a class name (H::C::X) is valid in constant expressions; it cannot be
// mapped there (no run time call is allowed), but it must not become a Runtime::cls() call, which
// is a fatal "Dynamic class names are not allowed in compile-time class constant references".
// The literal 'Orig\Thing'::X and the PHP 8.3 static initializer (a run time expression) are mapped.
class H { const C = 'Orig\Thing'; const O = H::C::X; const O2 = self::C::X; }
const G = H::C::X;
enum E: string { case A = H::C::X; }
#[\Orig\Attr(H::C::X)] class Z {}
class P { public $p = H::C::X; public static $s = 'Orig\Thing'::X; }
function f() { static $s = H::C::X; return $s; }
echo H::O, H::O2, G, E::A->value, (new ReflectionClass('Z'))->getAttributes()[0]->newInstance()->v, (new P)->p, P::$s, f(), "\n";
