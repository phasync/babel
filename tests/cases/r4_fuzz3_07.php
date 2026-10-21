<?php
// one eval site, different code each time (a template engine, a REPL): every eval'd unit has its own
// call sites, so a namespace fallback resolved in one must not be reused by another
namespace NA;
function run(string $code) { return eval($code); }
echo run('namespace NA; return strtoupper("a");'), "\n";
echo run('namespace NA; return fopen("x", "r");'), "\n";
echo run('namespace NA; return sleep(1);'), "\n";
