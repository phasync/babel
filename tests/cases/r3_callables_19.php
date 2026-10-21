<?php
// literal callables in every listed callable parameter, positional, named and mixed
echo call_user_func('fopen', 'x'), "\n";
echo call_user_func_array(callback: 'fopen', args: ['x']), "\n";
class R3cb19 { static function go() { return forward_static_call('sleep', 1) . forward_static_call_array('usleep', [1]); } }
echo R3cb19::go(), "\n";
echo implode(',', array_filter(['a'], 'curl_exec')), "\n";
echo implode(',', array_filter(callback: 'curl_exec', array: ['b'])), "\n";
echo implode(',', array_filter(['k' => 1], mode: ARRAY_FILTER_USE_KEY, callback: 'curl_exec')), "\n";
$w = ['x'];
array_walk($w, 'curl_exec');
array_walk_recursive($w, callback: 'curl_exec');
echo array_reduce([1], 'strtoupper', ''), "\n";
echo array_reduce(initial: '', callback: 'strtoupper', array: [1]), "\n";
echo array_find(['a'], 'curl_exec'), array_find_key(['k' => 'a'], 'curl_exec'), "\n";
var_dump(array_any(['a'], 'curl_exec'), array_all(callback: 'curl_exec', array: ['a']));
$u = [2, 1];
usort($u, 'curl_exec');
uasort($u, callback: 'curl_exec');
uksort(callback: 'curl_exec', array: $u);
echo count($u), "\n";
var_dump(is_callable('curl_exec'), is_callable(value: 'Orig\Thing::who'));
echo iterator_apply(new ArrayIterator([1, 2]), 'curl_exec', [1]), "\n";
echo preg_replace_callback('/a/', 'strtoupper', 'abc'), "\n";
echo preg_replace_callback(subject: 'abc', callback: 'strtoupper', pattern: '/b/'), "\n";
echo mb_ereg_replace_callback('c', 'strtoupper', 'abc'), "\n";
echo \Closure::fromCallable('fopen')('x'), "\n";
echo Closure::fromCallable(callback: 'Orig\Thing::who')(), "\n";
