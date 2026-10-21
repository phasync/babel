<?php
// mixed-case map keys and declarations; nested and alternative-syntax declarations inside functions
namespace Y { function helper() { return 'Y:helper'; } function up($s) { return "Y:up($s)"; } }
namespace {
    $b = new phasync\Babel\Babel(['App\Helper' => 'Y\helper', 'STRTOUPPER' => 'Hook\strtoupper', 'app\SLEEP' => 'Y\up']);
    $code = $b->translate('<?php namespace APP;
function HELPER() { return "App:helper"; }
echo helper(), " ", Helper(), " ", strToUpper("a"), "\n";
function install($n) {
    switch ($n):
        case 1:
            function Sleep($s) { return "App:sleep"; }
            break;
    endswitch;
    foreach ([1] as $_):
        if ($n):
            function strtoupper($s) { return "App:strtoupper"; }
        endif;
    endforeach;
}
function probe() { return sleep(0) . " " . STRTOUPPER("b"); }
function probe2() { return sleep(2) . " " . strtoupper("c"); }
echo probe(), "\n";
install(1);
echo probe(), " | ", probe2(), "\n";
', '/x/a.php');
    eval('?>' . $code);
}
