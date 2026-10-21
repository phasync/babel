<?php
// get_parent_class() without an argument reads the calling class scope, also through its first-class
// callable and a string callable; neither may go through a shim function (it has no class scope)
namespace App;
class P {}
class C extends P {
    function m() {
        $f = get_parent_class(...);
        $g = \get_parent_class(...);
        var_dump($f(), $g(), call_user_func('get_parent_class'), get_parent_class());
    }
}
(new C)->m();
