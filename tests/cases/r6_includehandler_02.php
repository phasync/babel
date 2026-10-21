<?php
// includeHandler: a path expression nested inside a function call's argument list stops at the
// enclosing call's ',' (it does not swallow the next argument); `include EXPR or die(...)` wraps
// the *whole* "EXPR or die(...)" (PHP's own grammar gives include a full `expr` as its operand,
// so this is not a special case for the rewriter -- getting it wrong is the well known
// "require $file or die()" footgun). Translating the already-translated code again (no marker, as
// an eval'd closure would be) must not wrap it a second time.
namespace Hook {
    function includeHandler($path, $dir)
    {
        echo 'H:', var_export($path, true), "\n";

        return $path; // identity: no real file needed, @ suppresses the resulting warning
    }
}
namespace {
    $b = new phasync\Babel\Babel([], [], true, true, 'Hook\includeHandler');
    $src = '<?php
    function take($a, $b) { return $b; }
    echo take(@include "x.php", "second-arg"), "\n";
    $calledDie = false;
    function die2($m) { global $calledDie; $calledDie = true; return $m; }
    $x = true;
    @include $x or die2("nope");
    echo $calledDie ? "die2 called" : "die2 skipped", "\n";
    ';
    $out = $b->translate($src, '/virtual/file.php');

    $tmp = tempnam(sys_get_temp_dir(), 'bl') . '.php';
    file_put_contents($tmp, $out);
    exec('php -l ' . escapeshellarg($tmp) . ' 2>&1', $lint, $rc);
    unlink($tmp);
    echo 'lint: ', ($rc === 0 ? 'ok' : 'FAIL'), "\n";

    $bare = str_replace([$b->marker . ' ', $b->marker], '', $out);
    $again = $b->translate($bare, '/virtual/file.php');
    echo 'idempotent: ', (str_replace([$b->marker . ' ', $b->marker], '', $again) === $bare ? 'yes' : 'NO'), "\n";

    eval(substr($out, 5));
}
