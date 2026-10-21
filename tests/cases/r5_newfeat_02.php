<?php
// `as` ends the pipe operand of a foreach expression just like ')' or ';' do.
class K { public function m() { return 'array_map'; } }
$o = new K;
$f = 'strtoupper';
foreach ('abc' |> $f as $v) {
    echo "never\n";
}
echo "skip\n";
$g = 'array_reverse';
foreach (['x', 'y'] |> $g as $k => $v) echo "$k=$v\n";
$h = 'curl_exec';
foreach (null |> $h as $v) {}
