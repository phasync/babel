<?php
// Group imports of mapped namespaced functions: mixed kinds, trailing commas, comments, aliases, CR line endings.
namespace A { function f() { return 'A\f'; } function h() { return 'A\h'; } const K = 'A\K'; class Cl { const N = 'A\Cl'; } }
namespace A\Sub { class C { const N = 'A\Sub\C'; } }
namespace B { function g() { return 'B\g'; } function h() { return 'B\h'; } }
namespace {
$b = new \phasync\Babel\Babel(['A\\f' => 'B\\g', 'a\\H' => '\\B\\h']);
$srcs = [
    "<?php\nnamespace X;\nuse A\\{Cl, function f, const K, Sub\\C as SC,};\necho f(), Cl::N, K, SC::N, \"\\n\";",
    "<?php\nnamespace X;\nuse function A\\{ /* c */ F as ff, // x\n  H, };\necho ff(), h(), \"\\n\";",
    "<?php\rnamespace X;\ruse A\\{function f,\r function h as hh}, A\\Cl;\recho F(), HH(), Cl::N, __LINE__, \"\\n\";",
    "<?php\nnamespace X {\nuse function A\\f, A\\h as HX;\necho f(), hx(), __LINE__, \"\\n\";\n}",
];
$dir = sys_get_temp_dir() . '/r3nc2_16_' . getmypid();
@mkdir($dir);
foreach ($srcs as $k => $src) {
    $out = $b->translate($src, "$dir/$k.php");
    file_put_contents("$dir/$k.php", $out);
    include "$dir/$k.php";
    unlink("$dir/$k.php");
}
rmdir($dir);
}
