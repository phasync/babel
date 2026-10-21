<?php
// brackets in strings, comments, heredocs and inline HTML must not pair with code brackets
$f = 'strtoupper'; $c = 'Orig\Thing';
echo $f(')]}' /* ({[ */) . $c::who(/* ) */) . "\n";
echo $f("({[{$f('"]})')}") , "\n";
echo <<<H
  ) ] } {$f('(')} ${'f'} { [
  H . $c::{'who'}() . "\n";
?>
inline ) ] } ( [ {
<?php
echo $f # ) ] }
   ('x'), ' ', $c::who /* ( */ (), "\n";
eval('echo $f(\')]}\') , "\n"; ?> html ) } ] <?php echo $c::who(), "\n";');
eval('?>' . "x ( [ {\n" . '<?php echo $f("}") ?>' . "\n" . '<?= $c::$p ?>' . "\n");
