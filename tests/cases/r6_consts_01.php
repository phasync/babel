<?php
// Constants: basic rewritten positions. A bare or fully qualified mapped constant becomes a call of
// its replacement wherever PHP allows a function call (plain expressions, echo, concatenation,
// function arguments, ternary/match/switch-case operands; a goto label of the same name, and a named
// argument label of the same name, are a different thing entirely and are never touched).
echo PHP_SAPI, "\n";
echo \PHP_SAPI, "\n";
echo 'sapi:' . PHP_SAPI . "\n";
function takesArg($x) { return "arg:$x"; }
echo takesArg(PHP_SAPI), "\n";
echo (true ? PHP_SAPI : 'never'), "\n";
echo match (true) { default => PHP_SAPI }, "\n";
switch ('HOOK:php_sapi') {
    case PHP_SAPI:
        echo "switch-case rewritten\n";
        break;
    default:
        echo "switch-case NOT rewritten\n";
}
function namedArgFn($PHP_SAPI) { return "named:$PHP_SAPI"; }
echo namedArgFn(PHP_SAPI: 'literal-label'), "\n";
function withStatic() {
    // since PHP 8.3, a static variable initializer accepts arbitrary expressions, so a mapped
    // constant here is rewritten like any other run time position
    static $cached = PHP_SAPI;
    return $cached;
}
echo withStatic(), "\n";
echo "text mentioning PHP_SAPI stays literal\n";
// a comment mentioning PHP_SAPI stays literal too
goto PHP_SAPI;
echo "unreachable\n";
PHP_SAPI:
echo "goto-label reached\n";
