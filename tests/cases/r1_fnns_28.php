<?php
namespace crlf;
use function sleep as nap,
    fopen;

echo nap(1), fopen("x"),
  usleep(2), "\n";
