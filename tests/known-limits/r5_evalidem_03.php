<?php
declare(strict_types=1);
// the strictness of a first-class callable of an internal function is the strictness of the code
// that calls it, not of the code that created it: a non-strict eval'd caller coerces
$f = is_a(...);
$o = unserialize('O:10:"Orig\Thing":0:{}');
try { var_dump($f($o, 'Orig\Thing')); } catch (TypeError $e) { echo "TE1\n"; }
try { var_dump($f($o, 5)); } catch (TypeError $e) { echo "TE2\n"; }
eval('try { var_dump($f($o, 5)); } catch (TypeError $e) { echo "TE3\n"; }');
eval('try { var_dump($f("Orig\Thing", "Orig\Thing", 1)); } catch (TypeError $e) { echo "TE4\n"; }');
eval('declare(strict_types=0); $g = class_exists(...);');
try { var_dump($g('Orig\Thing', 1)); } catch (TypeError $e) { echo "TE5\n"; }
