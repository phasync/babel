<?php
namespace A { function fopen($x) { return "A\\fopen"; } }
namespace B { function fopen($x) { return "B\\fopen"; } }
namespace {
    foreach (['A', 'B', 'C', 'A'] as $ns) {
        echo eval("namespace $ns; return fopen('x');"), "\n";
    }
}
