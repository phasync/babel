<?php
// round-5 fuzz runtime: Repl\K / H / helpers, and Orig\K + ofn/oref/ocmp as originals that must not be reached
namespace Orig {
    class K {
        public static $p = 'BAD'; public static $obj; public static $arr = []; const C = 'BAD'; const F = 'BAD';
        public $h; public $self; public $c = 'BAD'; public $n = null;
        static function __callStatic($n, $a) { return 'BAD-static'; } function __call($n, $a) { return 'BAD'; }
        function __invoke(...$a) { return 'BAD-inv'; }
    }
}
namespace {
    // (common part follows below)
    function ofn(...$a) { return 'BAD-ofn'; }
    function oref(&$x, ...$r) { return 'BAD-oref'; }
    function ocmp($a, $b) { return 0; }
}
namespace Repl {
    class K {
        public static $p = 'Orig\K'; public static $obj; public static $arr = ['c' => 'Orig\K', 'f' => 'ofn', 'h' => null];
        const C = 'Orig\K'; const F = 'ofn';
        public $h; public $self; public $c = 'Orig\K'; public $n = null;
        function __construct(...$a) { $this->self = $this; $this->h = \H::$root; }
        static function who(...$a) { return 'who[' . static::class . '](' . \implode(',', $a) . ')'; }
        static function mk(...$a) { return new static; }
        static function kc(...$a) { return 'Orig\K'; }
        static function kh(...$a) { return \H::$root; }
        static function kn(...$a) { return null; }
        function m(...$a) { return 'm(' . \implode(',', $a) . ')'; }
        function __invoke(...$a) { return 'inv(' . \implode(',', $a) . ')'; }
    }
}
namespace {
    class H {
        public static $root; public static $sp; public static $none = null;
        public $nx = null; public $n = null; public $o; public $cls = 'Orig\K'; public $fn = 'ofn'; public $fh = 'Orig\K::kh'; public $fha = ['Orig\K', 'kh'];
        public $ko; public $arr; public $self; public $pn = 'self';
        function __construct(...$a) { $this->self = $this; $this->o = self::$root ?? $this; $this->ko = new \Repl\K; $this->arr = ['c' => 'Orig\K', 'f' => 'ofn', 'h' => $this]; }
        function me(...$a) { return $this; } function nul(...$a) { return null; } function c(...$a) { return 'Orig\K'; } function f(...$a) { return 'ofn'; }
        static function sh(...$a) { return self::$root; } static function sc(...$a) { return 'Orig\K'; }
        function __toString(): string { return 'H'; }
    }
    H::$root = new H; H::$root->o = H::$root; H::$root->ko = new \Repl\K; H::$sp = H::$root;
    \Repl\K::$obj = H::$root; \Repl\K::$arr['h'] = H::$root;
    function rfn(...$a) { $o = []; foreach ($a as $x) { $o[] = is_scalar($x) || $x === null ? var_export($x, true) : get_debug_type($x); } return 'rfn(' . implode(',', $o) . ')'; }
    function rref(&$x, ...$r) { $x = is_string($x) ? $x . '!' : $x; return 'rref'; }
    function rcmp($a, $b) { return $b <=> $a; }
    function l($x) { $GLOBALS['LOG'][] = $x; return $x; }
    function LF() { $r = implode(',', $GLOBALS['LOG'] ?? []); $GLOBALS['LOG'] = []; return $r; }
    function D($v) { if (is_array($v)) { foreach ($v as $i => $x) { $v[$i] = is_object($x) ? get_class($x) : $x; } return json_encode($v); } return is_object($v) ? get_class($v) : var_export($v, true); }
}
