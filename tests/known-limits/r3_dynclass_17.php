<?php
// serialize / json_encode / var_export of $GLOBALS must not change because of the tool
function g() {
    $keys = array_filter(array_keys($GLOBALS), fn ($k) => str_contains($k, 'phasync'));
    var_dump(array_values($keys));
    try {
        $GLOBALS['x'] = 1;
        $s = serialize(array_filter($GLOBALS, fn ($v, $k) => $k[0] === '_' || $k === 'x', ARRAY_FILTER_USE_BOTH));
        echo strlen($s) > 0 ? "serialized\n" : "empty\n";
    } catch (Throwable $e) {
        echo get_class($e), ': ', $e->getMessage(), "\n";
    }
}
g();
