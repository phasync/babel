<?php
namespace A;
use Orig\Thing;
// generated stress: a big file created at run time, included (translated), and exercised
$n = 3000;
$code = "<?php\nnamespace Gen;\nuse Orig\\Thing;\n";
for ($i = 0; $i < $n; $i++) {
    $code .= "function f$i(Thing \$t, ?\\PDO \$p = null): ?Thing { \$x = fopen('a$i'); if (\$x) { return \$t; }\n  return is_a(\$t, 'Orig\\Thing') ? null : \$t; }\n";
}
$code .= "class Big {\n";
for ($i = 0; $i < $n; $i++) {
    $code .= "  public function m$i(Thing \$t): string { return \"{\$GLOBALS['gv']}\" . \$t::who() . sleep(1) . strtoupper('x'); }\n";
}
$code .= "}\nreturn __LINE__;\n";
$file = sys_get_temp_dir() . '/r1_lexer_30_gen_' . getmypid() . '.php';
file_put_contents($file, $code);
$t = new \Repl\Thing; $gv = "v";
echo include $file, "\n";
unlink($file);
echo get_class(\Gen\f2999($t)), "\n";
echo var_export(\Gen\f1($t, null) === $t, true), "\n";
echo (new \Gen\Big)->m2999($t), "\n";
echo (new \ReflectionFunction('Gen\f17'))->getParameters()[0]->getType(), ' ', (new \ReflectionFunction('Gen\f17'))->getParameters()[1]->getType(), "\n";
