<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$f = fn() => 'L(__FILE__);';
eval("{$f(
)}"
);
eval(" {$f()
}");
class K { static function m() { return 'L(__FILE__);'; } }
$x = "K"; $e = "";
eval("{$x::m()
}"

);
eval("{$x::m()}{$f(
)}"
);
eval(
"$e{$f()}{$x::m()
}"
);
