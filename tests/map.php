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
];
