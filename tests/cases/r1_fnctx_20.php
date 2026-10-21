<?php
interface I { const CB = usleep(...); public static function go(): string; }
abstract class P implements I {
    public array $cbs = [fopen(...), 'k' => sleep(...)];
    public static $s = strtoupper(...), $t = file_get_contents(...);
    final public const A = curl_exec(...), B = [stream_select(...)];
    protected static ?\Closure $n = null, $m = fopen(...);
    public readonly mixed $r;
    public function __construct() { $this->r = fopen(...); }
    public static function go(): string { return (static::$s)() . (self::$t)() . (self::A)() . (self::B[0])() . (static::$m)() . (I::CB)(); }
}
final class Q extends P {}
$q = new Q;
echo $q->cbs[0](), $q->cbs['k'](), ($q->r)(), "\n", Q::go(), "\n";
