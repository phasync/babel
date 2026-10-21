<?php
// Class constants and enum cases named like keywords are not constructs.
class C { const require = 'c-req'; const include_once = 'c-inc'; }
enum E { case include; case eval; const require = E::include; }
echo C::require, ' ', C::include_once, ' ', E::include->name, ' ', E::eval->name, ' ', E::require->name, "\n";
