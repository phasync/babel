<?php
namespace NA;
// two eval sites on one line share PHP's origin string; each eval'd unit has its own call sites
echo eval("namespace NA; return \\strlen('x') . file_get_contents('data:,hi');") . eval("namespace NA; return \\strlen('y') . fopen('php://memory', 'r');"), "\n";
