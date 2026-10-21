<?php
// A big map (every internal function, 300 classes) must not disable the translator: the pre-filter regex
// used to exceed PCRE's size limit, preg_match() returned false and translate() silently returned the source.
$fn = [];
foreach (get_defined_functions()['internal'] as $f) {
    $fn[$f] = 'Hook\\' . $f;
}
$cls = [];
for ($i = 0; $i < 300; $i++) {
    $cls["Big\\Cls$i"] = "Repl\\Big\\Cls$i";
}
$b = new \phasync\Babel\Babel($fn, $cls);
echo preg_replace('~/\*phasync-babel:[0-9a-f]+\*/~', '/*phasync-babel:MAP*/', $b->translate("<?php\nnamespace a;\necho trim(1), \\strlen(2); new \\Big\\Cls7;\n", '/x/y.php'));
