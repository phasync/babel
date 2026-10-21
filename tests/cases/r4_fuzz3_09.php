<?php
// a hook of a promoted constructor parameter is run time code, with or without a default value
$c = 'Orig\Thing';
class K {
    public function __construct(
        public string $b { get => $GLOBALS['c']::$p . $this->b; },
        public string $a = 'd' { get => $GLOBALS['c']::$p . $this->a; },
        public string $e = \Orig\Thing::X { set(string $v) { $this->e = $GLOBALS['c']::who() . $v; } get { return $GLOBALS['c']::$p . $this->e; } },
    ) {}
}
$k = new K('b');
echo $k->a, ' ', $k->b, ' ', $k->e, "\n";
$k->e = '!';
echo $k->e, "\n";
