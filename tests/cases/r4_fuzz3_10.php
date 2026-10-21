<?php
// the arrow hook of a promoted constructor parameter is ordinary code: an unqualified call there falls
// back at run time like anywhere else (here the namespaced function exists by then)
namespace NA;
eval('namespace NA; function strtoupper($x) { return "NA:$x"; }');
class K { public function __construct(public string $b { get => strtoupper($this->b); }) {} }
echo (new K('x'))->b, "\n";
