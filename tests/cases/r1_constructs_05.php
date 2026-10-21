<?php
try {
    eval('echo fopen("x"); $a = ;');
} catch (ParseError $e) {
    echo get_class($e), ': ', $e->getMessage(), ' @', $e->getLine(), "\n";
}
try {
    eval("\n\nfopen(;");
} catch (ParseError $e) {
    echo $e->getMessage(), ' @', $e->getLine(), "\n";
}
