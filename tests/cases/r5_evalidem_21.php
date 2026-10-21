<?php
declare(strict_types=0x1);
// strict_types=0x1 (also 01, 0b1, 0o1) is strict_types=1
$f = is_a(...);
$o = unserialize('O:10:"Orig\Thing":0:{}');
try { var_dump($f($o, 5)); } catch (TypeError $e) { echo "TE1\n"; }
try { var_dump(strlen(5)); } catch (TypeError $e) { echo "TE2\n"; }
eval('declare(strict_types=0b1); $g = class_exists(...); try { var_dump($g("Orig\Thing", 1)); } catch (TypeError $e) { echo "TE3\n"; }');
eval('declare(strict_types=0o1); $g = interface_exists(...); try { var_dump($g("Orig\Contract", 1)); } catch (TypeError $e) { echo "TE4\n"; }');
eval('declare(strict_types=01); $g = interface_exists(...); try { var_dump($g("Orig\Contract", 1)); } catch (TypeError $e) { echo "TE5\n"; }');
