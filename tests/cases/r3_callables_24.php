<?php
// generators and callbacks: yield inside callbacks, variable calls in generators
function r3cb24() {
    $f = 'strtoupper';
    $x = yield $f('a');
    yield call_user_func('fopen', $x);
    yield from array_filter(['q'], 'curl_exec');
    $g = (function () { $s = 'sleep'; yield $s(1); })();
    yield from $g;
}
$gen = r3cb24();
echo $gen->current(), "\n";
echo $gen->send('v'), "\n";
$gen->next();
echo $gen->current(), "\n";
$gen->next();
echo $gen->current(), "\n";
$cb = call_user_func(function () { yield 'fopen'; yield ['Orig\Thing', 'who']; });
foreach ($cb as $c) {
    echo $c('x'), "\n";
}
