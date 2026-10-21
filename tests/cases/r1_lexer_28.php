<?php
namespace A;
$d = __DIR__ . '/r1_lexer_inc';
echo json_encode(include "$d/shebang.inc"), "\n";
echo json_encode(include $d . '/bom.inc'), "\n";
echo json_encode(include($d . '/ns.inc')), "\n";
echo json_encode(include "$d/crlf.inc"), "\n";
ob_start(); include "$d/html.inc"; $o = ob_get_clean();
echo json_encode($o), $v, "\n";
echo (include "$d/bom.inc")[1] + 1, "\n";
$r = @include $d . '/missing.inc' or print("missing\n");
$t = true ? include "$d/ns.inc" : include "$d/bom.inc";
echo $t[1], "\n";
function inc($f) { return require_once $f; }
echo json_encode(inc("$d/ns.inc")), "\n";
echo json_encode(inc("$d/ns.inc")), "\n";
$x = [include "$d/bom.inc", 'k' => include "$d/ns.inc"];
echo count($x), "\n";
