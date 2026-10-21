<?php
// PHP 8.4: an arrow-form property hook on a promoted constructor parameter is a function body,
// not part of the parameter's constant default expression.
class K {
    public function __construct(
        public string $g = 'strtoupper' { get => ($this->g)('g'); },
        public string $c = 'Orig\Thing' { get => $this->c::who(); },
    ) {}
}
$k = new K;
echo $k->g, "\n", $k->c, "\n";
