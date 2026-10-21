<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
function g() {
  return eval(
    'L(__FILE__);'
  );
}
g();
