<?php
// missing files: warnings must read like PHP's without the tool
set_error_handler(function ($n, $m, $f, $l) { echo "W[$n]: $m @$l\n"; return true; });
var_dump(include 'r1_missing_a.php');
var_dump(include_once 'r1_missing_b.php');
var_dump(include __DIR__ . '/fixtures/nope.php');
try { var_dump(include ''); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(include "a\0b"); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { require 'r1_missing_c.php'; } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { require_once __DIR__ . '/fixtures/'; } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
var_dump(include __DIR__ . '/fixtures');
echo "done\n";
