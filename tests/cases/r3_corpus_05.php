<?php
// r3 corpus: a file whose only sites are calls via a variable or callable arguments ($f(...), call_user_func($f))
// is skipped by the quick pre-check, which looks only for mapped names, so a mapped callable
// held in a variable is called unmapped. With a small map this is the common case (dispatchers, pipelines,
// event emitters). The text of this file must not contain any mapped name (see tests/map.php) or keyword.
$f = 'sl' . 'eep';
var_dump($f(0), call_user_func($f, 0));
