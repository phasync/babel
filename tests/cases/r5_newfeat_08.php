<?php
// Unpacking a property (not a plain variable) passes the elements by value: usort(...$this->args)
// sorts a copy, the property is unchanged, like usort(...self::$s).
function cmp($a, $b) { return $a <=> $b; }
class H {
    public $args = [[2, 1], 'cmp'];
    public static $s = [[2, 1], 'cmp'];
    public array $typed = [[4, 3], 'cmp'];
    function run() {
        usort(...$this->args); echo json_encode($this->args[0]), "\n";
        usort(...self::$s); echo json_encode(self::$s[0]), "\n";
        usort(...$this->typed); echo json_encode($this->typed[0]), "\n";
        $o = $this;
        array_walk(...$o->args); echo json_encode($o->args[0]), "\n";
    }
}
(new H)->run();
$a = ['k' => [[9, 8], 'cmp']];
usort(...$a['k']); echo json_encode($a['k'][0]), "\n";
