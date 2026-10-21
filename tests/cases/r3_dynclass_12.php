<?php
// nullsafe chains before '::C', '::$p', '::class': PHP short-circuits '::$p' but not '::C' / '::class'
$a = null;
try { var_dump($a?->b::X); } catch (Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump($a?->b::$p); } catch (Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump($a?->b::class); } catch (Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump(isset($a?->b::$p)); } catch (Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump($a?->b::$p ?? 'dflt'); } catch (Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
$o = new stdClass();
$o->b = 'Orig\Thing';
var_dump($o?->b::X, $o?->b::$p, isset($o?->b::$p));
