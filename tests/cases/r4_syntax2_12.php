<?php
// Group use with mapped namespaced functions, with a custom map: regenerated statements keep lines.
namespace Lib { function fa() { return 'Lib\fa'; } const C = 'Lib\C'; }
namespace Lib\Sub { function fb() { return 'Lib\Sub\fb'; } function fc() { return 'Lib\Sub\fc'; } }
namespace {
$b = new phasync\Babel\Babel(['Lib\fa' => 'Hook\fopen_alt', 'Lib\Sub\fb' => 'Hook\fopen'], []);
$codes = [
    "use Lib\\{function fa, function Sub\\fb as bb, const C, Sub};\r\necho fa(), ' ', bb(), ' ', C, ' ', Sub\\fc(), \"\\n\";",
    "use function Lib\\{\r\n  fa as x,\r\n  Sub\\fb,\r\n  Sub\\fc\r\n} ?>\n<?php echo x(), ' ', fb(), ' ', fc(), ' ', __LINE__, \"\\n\";",
    "namespace N;\nuse function Lib\\Sub\\{fc, fb}; use function Lib\\fa;\necho fc(), ' ', fb(), ' ', fa(), ' ', \\Lib\\fa(), \"\\n\";",
    "namespace N2;\nuse function \\Lib\\{fa};\nuse const \\Lib\\{C as K};\necho fa(), K, __LINE__, \"\\n\";",
];
foreach ($codes as $n => $code) {
    $out = $b->translate($code, "/x.php($n) : eval()'d code");
    $bare = str_replace($b->marker, '', $out);
    echo preg_match_all('/\r\n|\r|\n/', $code) === preg_match_all('/\r\n|\r|\n/', $out) ? '' : "LINES CHANGED\n";
    echo str_replace($b->marker, '', $b->translate($bare, "/x.php($n) : eval()'d code")) === $bare ? '' : "NOT IDEMPOTENT\n";
    eval($out);
}
}
