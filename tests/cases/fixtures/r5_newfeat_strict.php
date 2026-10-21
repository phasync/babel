<?php
declare(strict_types=1);
function strict_call(callable $f, ...$a) { return $f(...$a); }
