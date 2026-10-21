<?php
namespace a\b\c;
function sleep($x) { return 'abc'; }
namespace a\b;
echo sleep(1), c\sleep(1), \a\b\c\sleep(1), namespace\c\sleep(1), "\n";
