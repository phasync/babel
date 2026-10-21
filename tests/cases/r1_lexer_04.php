<?php
# fopen('x') comment
// sleep(1)
/* usleep(1) */
/** @see fopen()
 * use function fopen as sleep;
 * new Orig\Thing
 */
#[Orig\Attr('a')]
function f(#[Orig\Attr] $a = 1) { return fopen('x'); }
# [Orig\Attr] still a comment
echo f(), "\n";
echo (new ReflectionFunction('f'))->getAttributes()[0]->getName(), "\n";
echo (new ReflectionFunction('f'))->getParameters()[0]->getAttributes()[0]->getName(), "\n";
#[Orig\Attr(v: [1,2])] class C {}
echo (new ReflectionClass('C'))->getAttributes()[0]->getName(), "\n";
?>
