<?php
// eval as a switch case expression must still run translated code.
switch ('HOOK:fopen') {
    case eval('return fopen("x", "r");'): echo "hooked\n"; break;
    default: echo "not hooked\n";
}
