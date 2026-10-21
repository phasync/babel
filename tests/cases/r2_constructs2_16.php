<?php
$d = __DIR__ . '/fixtures/';
echo eval(include $d . 'r2_c2_code.php'), "\n";
echo eval(
  include
  $d
  . 'r2_c2_code.php'
), "\n";
echo include eval('return __DIR__ . "/fixtures/r2_c2_p.php";'), "\n";
echo include eval('return dirname(__FILE__);') . '/fixtures/r2_c2_q.php', "\n";
echo include dirname(__FILE__) . '/fixtures/r2_c2_p.php', "\n";
echo eval('return include "' . $d . 'r2_c2_q.php";'), "\n";
echo eval('return include __DIR__ . "/fixtures/r2_c2_p.php";'), "\n";
echo eval('return eval(include "' . $d . 'r2_c2_code.php");'), "\n";
