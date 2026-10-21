<?php
// The same file path included twice with different content (a regenerated cache file): PHP compiles
// it again, every call site starts fresh.
namespace A { function fopen(...$a) { return 'A\fopen'; } function sleep(...$a) { return 'A\sleep'; } }
namespace {
    $f = sys_get_temp_dir() . '/r4_idempotence_08_' . getmypid() . '.php';
    foreach (["<?php namespace A; echo fopen('x'), \"\\n\";", "<?php namespace B; echo fopen('x'), \"\\n\";", "<?php namespace B; echo sleep(1), \"\\n\";", "<?php namespace A; echo sleep(1), \"\\n\";"] as $code) {
        file_put_contents($f, $code);
        include $f;
    }
    unlink($f);
}
