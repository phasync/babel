<?php
// an array literal that is only part of the callback expression
echo call_user_func(['fopen'][0], 'x'), "\n";
echo call_user_func(['cb' => 'fopen']['cb'], 'x'), "\n";
echo call_user_func(array('sleep')[0], 1), "\n";
echo call_user_func([] ?: ['Orig\Thing', 'who']), "\n";
echo implode(',', array_filter(['a'], [0 => 'curl_exec'][0])), "\n";
