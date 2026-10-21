<?php
// fileConstants: __FILE__ and __DIR__ become string literals of the unit's original path and
// directory. A __FILE__/__DIR__ used as a name (a class constant, a method, a trait alias, after
// -> or ::) is a different thing entirely and must be left alone.
namespace {
    $b = new phasync\Babel\Babel([], [], true, true, null, true);
    $src = '<?php
    namespace app;
    class Thing {
        const __FILE__ = "const-value";
        public function __DIR__() { return "method-value"; }
    }
    function f() { return [__FILE__, __DIR__]; }
    $t = new Thing();
    echo Thing::__FILE__, "\n";
    echo $t->__DIR__(), "\n";
    print_r(f());
    ';
    $out = $b->translate($src, '/my/app/file.php');

    $tmp = tempnam(sys_get_temp_dir(), 'bl') . '.php';
    file_put_contents($tmp, $out);
    exec('php -l ' . escapeshellarg($tmp) . ' 2>&1', $lint, $rc);
    unlink($tmp);
    echo 'lint: ', ($rc === 0 ? 'ok' : 'FAIL'), "\n";
    echo 'lines preserved: ', (preg_match_all('/\n/', $src) === preg_match_all('/\n/', $out) ? 'yes' : 'no'), "\n";

    eval(substr($out, 5));
}
