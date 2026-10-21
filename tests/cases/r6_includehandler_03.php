<?php
// includeHandler + precedence: require/include nested as one branch of a ternary or a match arm
// must stop its operand at that branch's own ':' or ',' -- not swallow the enclosing construct's
// other branch (PHP's own parser ends a nested require's operand there, confirmed against real
// PHP) -- while a require/include that itself *starts* a ternary, or whose operand is reached
// through '.', still gets the *whole* trailing expression (also confirmed: PHP's grammar gives it
// everything up to the enclosing construct's own boundary, same as the already-tested 'or die()'
// footgun in r6_includehandler_02).
namespace Hook {
    function includeHandler($path, $dir)
    {
        echo 'H:', var_export($path, true), "\n"; // the operand actually captured, the one thing under test

        return __DIR__ . '/fixtures/r6_inc_target.php'; // a real file: require must not fatal on a missing one
    }
}
namespace {
    $b = new phasync\Babel\Babel([], [], true, true, 'Hook\includeHandler');
    $src = '<?php
    // nested in a ternary\'s true branch: operand must stop before the outer ":"
    $cond = true;
    $v = $cond ? @require "true-branch.php" : "false-literal";
    var_dump($v);

    // nested in a ternary\'s false branch: operand must stop before the enclosing ";"/","
    $cond = false;
    $v = $cond ? "true-literal" : @require "false-branch.php";
    var_dump($v);

    // require itself starts the ternary: its operand is the whole thing, "." included
    $v = @require "starts" . "-ternary.php" ? "yes" : "no";
    var_dump($v);

    // nested in a match arm: operand must stop before the arm\'s own ","
    $v = match (true) {
        true => @require "match-arm.php",
        default => "unreached",
    };
    var_dump($v);

    // nested in a function call argument, itself inside a ternary\'s true branch
    function take($a, $b) { return [$a, $b]; }
    $cond = true;
    $v = $cond ? take(@require "call-branch.php", "second-arg") : "unreached";
    var_dump($v);
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
