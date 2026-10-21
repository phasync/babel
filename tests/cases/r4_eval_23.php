<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
function tr() { foreach (debug_backtrace() as $f) if (($f['function'] ?? '') === 'eval') echo 'eval frame line ', $f['line'], "\n"; }
$f = fn() => 'tr();';
eval(
$f
(
)
);
try {
    eval(
    'throw new Exception("e");'
    . ''
    );
} catch (Exception $e) { echo $e->getLine(), ' ', basename($e->getFile()), ' ', $e->getTrace()[0]['line'], "\n"; }
set_error_handler(function ($no, $str, $file, $line) { echo "warn: $str @", basename($file), ":$line\n"; return true; });
eval(
[
'x'
]
);
eval([
]);
