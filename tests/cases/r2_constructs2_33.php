<?php
class H {
    public string $p { get => include __DIR__ . '/fixtures/r2_c2_p.php'; }
    public string $q { get { return include __DIR__ . '/fixtures/r2_c2_q.php'; } }
    public string $e {
        get => eval(
            'return basename(__FILE__);'
        );
    }
    public array $w = [] {
        set(array $value) => [include __DIR__ . '/fixtures/r2_c2_p.php', $value];
    }
    public function __construct(public string $c = __DIR__ . '/fixtures/r2_c2_q.php') {}
}
$h = new H;
echo $h->p, $h->q, "\n", $h->e, "\n";
$h->w = ['v'];
echo json_encode($h->w), "\n";
echo include $h->c, "\n";
echo include (new H(__DIR__ . '/fixtures/r2_c2_p.php'))->c, "\n";
echo include new H() ?->c, "\n";
