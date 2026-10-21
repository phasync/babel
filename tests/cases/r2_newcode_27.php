<?php
// Global-namespace rule: functions declared in the global namespace never stop redirection; namespaced ones do.
namespace {
    if (!function_exists('strtoupper')) { function strtoupper($s) { return 'own'; } }
    echo strtoupper('a'), ' ', \strtoupper('a'), "\n";
}
namespace A\B {
    function SLEEP($s) { return 'own-sleep'; }
    echo sleep(1), ' ', \sleep(1), ' ', namespace\sleep(1), ' ', fopen('x', 'r'), "\n";
}
namespace a\b {
    echo sleep(1), ' ', \A\B\sleep(1), "\n";
}
namespace {
    echo sleep(1), ' ', A\B\sleep(2), "\n";
    $f = sleep(...);
    echo $f(1), "\n";
}
