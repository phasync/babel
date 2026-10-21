<?php
namespace inert;
use Orig\Thing;
use PDO;
/**
 * @param PDO $p
 * @return Thing new Thing; instanceof Thing; Thing::class; $cls::who(); is_a($x, 'Orig\Thing')
 */
function f($p) {
    // new PDO; Thing::X; function g(Thing $t)
    # catch (Thing $e)
    $a = 'new PDO; Thing::class; $cls::who(); function (PDO $p)';
    $b = "PDO::class and \$x instanceof Thing and {$p}";
    $c = <<<TXT
        new Thing; Thing::class; PDO::class
        TXT;
    $d = <<<'RAW'
        function z(Thing $t): PDO { return $t instanceof PDO; } is_a($x, 'Orig\Thing')
        RAW;
    $e = ['Orig\Thing' => 'PDO', 'k' => 'Thing'];
    $f = 'Orig\Thing';
    $g = "Orig\\Thing";
    return [$a, $b, $c, $d, $e, $f, $g];
}
echo json_encode(f('P')), "\n";
?>
new PDO; Thing::class; instanceof Thing; is_a($x, 'Orig\Thing');
<?php echo "end\n";
