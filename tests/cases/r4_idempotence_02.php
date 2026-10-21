<?php
// A map whose replacement is itself a function/class the translator treats specially (callable or
// class-name arguments): the constructor must reject it, or a second translation must change nothing.
use phasync\Babel\Babel;

$tests = [
    [['myapply' => 'call_user_func', 'fopen' => 'Hook\fopen'], [], "<?php echo myapply('fopen', 'x');"],
    [['myisa' => 'is_a'], ['Orig\Thing' => 'Repl\Thing'], "<?php var_dump(myisa(\$o, 'Orig\\Thing'));"],
    [['myconst' => 'constant'], ['Orig\Thing' => 'Repl\Thing'], "<?php echo myconst('Orig\\Thing::X');"],
    [['strtoupper' => 'Hook\strtoupper'], ['My\Refl' => 'ReflectionClass', 'Orig\Thing' => 'Repl\Thing'], "<?php \$r = new My\\Refl('Orig\\Thing');"],
    [['fopen' => 'Hook\fopen'], ['My\Clo' => 'Closure'], "<?php \$f = My\\Clo::fromCallable('fopen');"],
];
foreach ($tests as $n => [$f, $c, $src]) {
    try {
        $b = new Babel($f, $c);
    } catch (\InvalidArgumentException $e) {
        echo "$n ok\n";
        continue;
    }
    $t1 = str_replace($b->marker . ' ', '', $b->translate($src, '/t.php'));
    $t2 = str_replace($b->marker . ' ', '', $b->translate($t1, '/t.php'));
    echo $n, ' ', $t1 === $t2 ? 'ok' : "changed:\n  $t1\n  $t2", "\n";
}
