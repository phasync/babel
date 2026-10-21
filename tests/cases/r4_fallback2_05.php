<?php
// different code eval'd at one eval site (same origin string) must not share call site choices
namespace App;
foreach (['strtoupper', 'file_get_contents', 'usleep'] as $fn) {
    echo eval("namespace App; return $fn('x');"), "\n";
}
echo eval('namespace App; return strtoupper("a");'), ' ', eval('namespace App; return fopen("b", "r");'), "\n";
