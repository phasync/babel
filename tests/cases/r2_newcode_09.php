<?php
// include as a switch case expression must include the translated file.
switch ('HOOK:fopen') {
    case include __DIR__ . '/fixtures/r2_newcode_inc.php': echo "hooked\n"; break;
    default: echo "not hooked\n";
}
