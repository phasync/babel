<?php
// r3 corpus: a callable array literal whose class element is computed and starts with a string literal
// (['Orig\\' . $n, 'm']) is neither mapped nor wrapped in Runtime::fn(): the translator sees a leading string token
// and takes the element for a literal. [__NAMESPACE__ . 'X', 'm'] (leading non-string token) is wrapped.
// Moodle: call_user_func(array('block_'.$blockname, $method)), call_user_func_array(array('repository_' . $plugin, ...)).
$n = 'Thing';
echo call_user_func(['Orig\\' . $n, 'who']), ' ', call_user_func([__NAMESPACE__ . 'Orig\Thing', 'who']), "\n";
echo call_user_func(['Orig\Thing', 'who']), "\n";
