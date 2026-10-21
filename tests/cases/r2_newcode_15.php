<?php
// The class of a static access is a call result: f()::x(), A::m()::X.
function cls() { return 'Orig\Thing'; }
class Holder { static function get() { return 'Orig\Thing'; } }
echo cls()::who(), "\n";
echo Holder::get()::X, "\n";
