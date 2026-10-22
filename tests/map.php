<?php
// The standard map every case is translated with.
return [
    'functions' => [
        'fopen' => 'Hook\\fopen',
        'sleep' => 'Hook\\sleep',
        'usleep' => 'Hook\\usleep',
        'file_get_contents' => 'Hook\\file_get_contents',
        'stream_select' => 'Hook\\stream_select',
        'curl_exec' => 'Hook\\curl_exec',
        'strtoupper' => 'Hook\\strtoupper',
        'array_map' => 'Hook\\array_map',
    ],
    'classes' => [
        'Orig\\Thing' => 'Repl\\Thing',
        'Orig\\Base' => 'Repl\\Base',
        'Orig\\Contract' => 'Repl\\Contract',
        'Orig\\Attr' => 'Repl\\Attr',
        'Orig\\Err' => 'Repl\\Err',
        'Orig\\Tr' => 'Repl\\Tr',
        'PDO' => 'Repl\\PDO',
    ],
    'constants' => [
        // PHP_SAPI itself: the real motivating case (can never be locally re-declared).
        'PHP_SAPI' => 'Hook\\php_sapi',
        // A fictitious global constant, used to exercise "this unit declares/imports a namespaced
        // constant of that name" without colliding with any real predefined constant.
        'TEST_CONST' => 'Hook\\test_const',
    ],
];
