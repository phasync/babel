<?php
// Chains split over lines, with comments and whitespace between tokens: lines of side effects and exceptions stay.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), " @", $e->getLine(), "\n"; } }
function tr($x) { echo "tr($x)@" . debug_backtrace()[0]['line'] . " "; return $x; }
class H { public $b = 'Orig\Thing'; public $self; public $nul;
  public function __construct() { $this->self = $this; }
  public static function id($x) { return $x; } public static function boom() { throw new Exception('boom'); } }
$a = new H; $z = null;
t(fn() => $a
    ?->self
    ::id(tr(1))
);
t(fn() => $a ?-> /* c */ self :: /* d */ id ( $a ) ?-> b
  :: who ( tr ( 2 ) ));
t(fn() => (
  $a?->self
)::id(
  tr(3)
));
t(fn() => $a?->self
  ::boom());
t(fn() => $z?->self
  ::id(tr(4)) ?? tr(5)
);
t(fn() => $a?->b::$nope
  ?? 'nope');
t(fn() => $a # comment
  ?->self::id(tr(6)));
