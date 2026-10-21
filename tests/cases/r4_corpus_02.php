<?php
// r4 corpus: pcntl_signal()'s $handler (callable|int in the manual) has no declared type, so the callable
// table built from Reflection misses it: a mapped callable installed as a signal handler is not mapped.
// Seen in the corpus: symfony/console SignalRegistry, seld/signal-handler, composer/xdebug-handler, phpunit.
pcntl_signal(SIGUSR1, 'Orig\Thing::who');
var_dump(pcntl_signal_get_handler(SIGUSR1));
$h = 'sleep';
pcntl_signal(SIGUSR2, $h);
var_dump(pcntl_signal_get_handler(SIGUSR2));
pcntl_signal(SIGHUP, SIG_IGN);
var_dump(pcntl_signal_get_handler(SIGHUP) === SIG_IGN);
