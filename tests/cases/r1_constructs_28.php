<?php
$d = __DIR__ . '/fixtures';
$x = 1;
if ($x): echo include "$d/r1_inc_ret2.php"; else: echo include "$d/r1_inc_ret.php"; endif;
echo "\n";
switch (include "$d/r1_inc_ret2.php") {
    case 'S': echo include "$d/r1_inc_ret.php"; break;
    default: echo "no";
}
echo "\n";
$p = include <<<P
$d/r1_inc_ret2.php
P;
echo $p, "\n";
$p = include <<<'P'
fixtures/r1_inc_ret2.php
P
;
echo $p, "\n";
$p = require_once(
    // comment
    "$d/r1_inc_ret2.php" /* trailing */
);
var_dump($p);
$fn = fn() => include "$d/r1_inc_ret.php";
echo $fn(), "\n";
$fn2 = static function () use ($d) { return require "$d/r1_inc_ret2.php"; };
echo $fn2(), "\n";
?>
text <?= include "$d/r1_inc_ret2.php" ?> more <?php echo include "$d/r1_inc_ret.php" ?>

end <?php $z = (include "$d/r1_inc_ret2.php"); include "$d/r1_inc_ret.php" ?>
