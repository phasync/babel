<?php
namespace A { function fopen(...$a) { return 'A\fopen'; } }
namespace {
foreach (["namespace A; echo fopen('x'), \"\\n\";", "namespace B; echo fopen('x'), \"\\n\";", "namespace B; echo sleep(1), \"\\n\";"] as $c) {
    eval($c);
}
}
