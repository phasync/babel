<?php
namespace a;
echo fopen('x'), "\n";
echo \fopen('x'), "\n";
echo namespace\fopen('x'), "\n";
function fopen($x) { return 'a-own'; }
echo fopen('x'), "\n";
echo \fopen('y'), "\n";
