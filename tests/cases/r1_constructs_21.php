<?php
class K {
    const INCLUDE = 'ci';
    const EVAL = 'ce';
    const REQUIRE_ONCE = 'rq';
}
echo K::INCLUDE, K::EVAL, K::REQUIRE_ONCE, "\n";
echo fopen('a'), "\n";
