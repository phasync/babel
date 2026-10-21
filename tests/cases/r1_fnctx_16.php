<?php
namespace n;
function maker() { function sleep($x) { return 'inner-sleep'; } }
if (false) { function fopen($x) { return 'never-declared'; } }
echo sleep(1), ' ', fopen('x'), "\n";
