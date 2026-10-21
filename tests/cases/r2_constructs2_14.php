<?php
$d = __DIR__ . '/fixtures/';
if (true): echo include $d . 'r2_c2_p.php'; endif;
if (false) echo 'no'; else echo include $d . 'r2_c2_q.php';
echo "\n";
goto lbl;
echo "skipped\n";
lbl: echo include $d . 'r2_c2_p.php', "\n";
switch (include $d . 'r2_c2_p.php'):
    case include $d . 'r2_c2_p.php': echo "case P\n"; break;
endswitch;
switch ('Q') {
    case include $d . 'r2_c2_q.php': echo "case Q:\n"; break;
}
for ($i = include $d . 'r2_c2_two.php'; $i < 3; $i++): echo $i; endfor;
echo "\n";
echo include (#[SomeAttr] fn() => $d . 'r2_c2_p.php')(), "\n";
?>
<?= include $d . 'r2_c2_q.php' ?>

<?php echo include $d . 'r2_c2_p.php' /* c ; ) */ ?>

<?php
echo include /* ; */ $d . 'r2_c2_q.php' // ; )
, "\n";
$x = include $d . 'r2_c2_p.php' ?>|<?php echo $x, "\n";
