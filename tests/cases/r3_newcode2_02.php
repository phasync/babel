<?php
// A multi-line group import ended by a close tag: regenerating it must not turn its newlines into output.
$b = new \phasync\Babel\Babel(['A\\f' => 'B\\g', 'A\\h' => 'B\\h']);
$dir = sys_get_temp_dir() . '/r3nc2_02_' . getmypid();
@mkdir($dir);
foreach (["LF" => "<?php\nuse function A\\{\n f,\n h\n} ?>\n[X]\n", "CR" => "<?php\ruse function A\\{\r f\r} ?>\r[X]\r",
    "MIX" => "<?php\nuse function A\\{\r\n f\n} ?>\r\n[X]\n"] as $k => $src) {
    $out = $b->translate($src, $dir . '/a.php');
    file_put_contents($dir . "/$k.php", $out);
    $o = shell_exec(PHP_BINARY . ' ' . escapeshellarg("$dir/$k.php"));
    echo $k, ' ', json_encode($o), ' ', substr_count($src, "\r") + substr_count($src, "\n") - substr_count($src, "\r\n"),
        ' ', substr_count($out, "\r") + substr_count($out, "\n") - substr_count($out, "\r\n"), "\n";
    unlink("$dir/$k.php");
}
rmdir($dir);
