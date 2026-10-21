<?php
// Replacement implementations used by every case. Hooked functions return "HOOK:<name>".
namespace Hook {
    function fopen(...$a) { return 'HOOK:fopen'; }
    function sleep(...$a) { return 'HOOK:sleep'; }
    function usleep(...$a) { return 'HOOK:usleep'; }
    function file_get_contents(...$a) { return 'HOOK:file_get_contents'; }
    function stream_select(...$a) { return 'HOOK:stream_select'; }
    function curl_exec(...$a) { return 'HOOK:curl_exec'; }
    function strtoupper(...$a) { return 'HOOK:strtoupper'; }
    function array_map(...$a) { return 'HOOK:array_map'; }
    function fopen_alt(...$a) { return 'HOOK:fopen_alt'; }
}
namespace Orig {
    class Thing { const X = 'orig'; public static $p = 'orig'; public static function who() { return 'Orig\Thing'; } }
    class Base { public function name() { return 'Orig\Base'; } }
    interface Contract {}
    #[\Attribute] class Attr { public function __construct(public $v = null) {} }
    class Err extends \Exception {}
    trait Tr { public function who() { return 'Orig\Tr'; } }
}
namespace Repl {
    class Thing { const X = 'repl'; public static $p = 'repl'; public static function who() { return 'Repl\Thing'; } }
    class Base { public function name() { return 'Repl\Base'; } }
    interface Contract {}
    #[\Attribute] class Attr { public function __construct(public $v = null) {} }
    class Err extends \Exception {}
    trait Tr { public function who() { return 'Repl\Tr'; } }
    class PDO { public function __construct(...$a) {} }
}
