<?php
// hooks on promoted constructor parameters, set hooks with typed parameter, final/& hooks
namespace s26;
use Orig\Thing;
class C {
    public function __construct(
        public ?Thing $t = null {
            set(?Thing $v) { $this->t = $v ?? new Thing; }
        },
        public Thing|string $u = 'x' {
            final get => is_string($this->u) ? strtoupper($this->u) : $this->u::who();
        },
    ) {}
    public array $list = [] { &get => $this->list; }
    public Thing $virt { get { return new Thing; } }
}
$c = new C(null, new Thing);
echo $c->t::who(), ' ', $c->u, ' ', $c->virt::who(), "\n";
echo (new C)->u, "\n";
$c->list[] = 1;
echo count($c->list), "\n";
