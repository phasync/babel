<?php
// Imports of mapped global functions: multi-item, leading backslash, aliases, upper case keywords, ended by a close tag.
namespace App;
USE FUNCTION \fopen, STRTOUPPER as su, \usleep as sleep ?>
<?php Use Function file_get_contents AS fgc; use function curl_exec;
echo FOPEN("a", "r"), " ", SU("a"), " ", Sleep(1), " ", fgc("x"), " ", Curl_Exec(1), " ", \fopen("a", "r"), " ", strtoupper("x"), "\n";
