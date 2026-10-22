<?php
// A constants map whose replacement is itself a mapped function, or a function the translator
// treats specially (callable or class-name arguments, or eval), or whose name is invalid: the
// constructor must reject it. A valid map must not throw.
use phasync\Babel\Babel;

$tests = [
    [['Hook\php_sapi' => 'Hook\other'], ['PHP_SAPI' => 'Hook\php_sapi']], // replacement is itself a mapped function
    [[], ['PHP_SAPI' => 'is_a']],                                 // replacement takes a class-name argument
    [[], ['PHP_SAPI' => 'constant']],                             // replacement takes a member-string argument
    [[], ['PHP_SAPI' => 'eval']],                                 // replacement is eval
    [[], ['not a name' => 'Hook\php_sapi']],                      // invalid constant name
    [[], ['PHP_SAPI' => 'not a name']],                           // invalid replacement name
    [[], ['PHP_SAPI' => 'static']],                               // replacement is a reserved word
];
foreach ($tests as $n => [$f, $k]) {
    try {
        new Babel($f, [], constants: $k);
        echo "$n not rejected\n";
    } catch (\InvalidArgumentException $e) {
        echo "$n ok\n";
    }
}
// a valid map must not throw, and unused by default (no constants) keeps identity translation
$b = new Babel([], [], constants: ['PHP_SAPI' => 'Hook\php_sapi']);
echo 'valid ok', "\n";
echo (new Babel())->isIdentity() ? 'default identity' : 'default NOT identity', "\n";
echo $b->isIdentity() ? 'mapped identity (BUG)' : 'mapped NOT identity', "\n";
