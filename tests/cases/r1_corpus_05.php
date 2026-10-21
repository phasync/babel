<?php
// A global function that the file declares only conditionally (a polyfill) does not shadow the hooked
// internal function: there is no namespace fallback in the global namespace, so the call must be hooked.
if (!function_exists('sleep')) {
    function sleep($s) { return 'polyfill'; }
}
echo sleep(1), ' ', \sleep(1), "\n";
