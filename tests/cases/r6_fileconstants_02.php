<?php
// fileConstants: __FILE__/__DIR__ are only replaced in file units, never inside eval'd code (its
// own, separately translated unit) -- eval() keeps reporting PHP's own real synthetic position
// for __FILE__ there, not this unit's literal.
namespace {
    $b = new phasync\Babel\Babel([], [], true, true, null, true);
    phasync\Babel\Runtime::configure($b);
    $src = '<?php
    echo __FILE__, "\n";
    eval(\'echo __FILE__, "\\n";\');
    ';
    $out = $b->translate($src, '/my/app/file.php');
    eval(substr($out, 5));
}
