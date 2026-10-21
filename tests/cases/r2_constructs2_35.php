<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
class P { static function m() { return 'L("p", __FILE__);'; } }
class C extends P {
  static function n() { return 'L("n", __FILE__);'; }
  function run() {
    eval(parent
     ::
     m()
    );
    eval(static
     ::
     n()
    );
    eval($this
     ->
     {'n'}()
    );
    $m = 'n';
    eval($this::
     $m()
    );
    eval(self
     ::n
     (
     )
    );
  }
}
(new C)->run();
