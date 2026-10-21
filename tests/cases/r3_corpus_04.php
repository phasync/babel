<?php
// r3 corpus: a class-name function called with argument unpacking or as a first-class callable is rewritten to the
// \phasync\Babel\Shim\ stand-in even when the function itself is mapped; the shim calls the real global function,
// so the mapping of the function is lost (class_exists(...$a) no longer reaches the replacement), and inside a
// namespace PHP's fallback to a same-named namespaced function (ns\class_exists from another file) is bypassed too.
namespace Hook { function class_exists(...$a) { return 'HOOK:class_exists'; } }
namespace {
$b = new \phasync\Babel\Babel(['class_exists' => 'Hook\class_exists'], ['Orig\Thing' => 'Repl\Thing']);
$code = $b->translate("<?php\n\$a = ['Orig\\\\Thing'];\necho class_exists('Orig\\\\Thing'), ' ', class_exists(...\$a), ' ', \\class_exists(...)('x'), \"\\n\";\n", '/x/y.php');
eval('?>' . $code);
}
