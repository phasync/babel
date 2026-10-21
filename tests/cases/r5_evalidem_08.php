<?php
// the line of eval'd code when the eval argument is a rewritten nullsafe chain / pipe
namespace Orig;
class Code {
    public static function c($x = null) { return '\Orig\L(__FILE__);'; }
    public static $p = '\Orig\L(__FILE__);';
}
function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$o = new \stdClass;
$o->x = 'Orig\Code';
$o->y = $o;
$n = null;
eval($o
    ?->x
    ::c());
eval($o?->x::c(
    1,
    2
));
eval($o?->y
    ?->x::$p);
eval($n?->x::c()
    ?? '\Orig\L(__FILE__);');
eval($o?->x::$p
    ?? 'x');
eval($n?->x
  ::$p ?? '\Orig\L(__FILE__);'
);
eval('\Orig\L(__FILE__);'
    |> trim(...));
$t = 'trim';
eval('\Orig\L(__FILE__);'
    |> $t
);
eval("{$o->x::c()}"
);
eval("
{$o?->x::c()}");
