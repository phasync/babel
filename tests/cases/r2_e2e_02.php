<?php
// r2_e2e_02: the php-mock / override pattern in real code. swerve-codeigniter declares
// CodeIgniter\HTTP\Files\move_uploaded_file() in its own file so that CodeIgniter's unqualified
// call reaches it through namespace fallback; translated, the call goes to the hook and the
// override is bypassed (uploads fail with HTTP 400). Here the override comes from another unit.
namespace App\Files;

eval('namespace App\Files; function fopen($f) { return "override:" . \fopen($f); }');

function open() { return fopen('x'); }
echo open(), "\n";
echo \function_exists('App\Files\fopen') ? "declared\n" : "missing\n";
