<?php
declare(strict_types=1);
namespace Stress;

use Orig\Thing;
use Orig\{Base, Contract as C, Err as E};
use Orig\Attr;
use PDO;
use ReflectionClass, ReflectionType;

class S0 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S1 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S2 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S3 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S4: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S5 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S6 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S7 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S8 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S9 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S10 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S11: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S12 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S13 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S14 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S15 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S16 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S17 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S18: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S19 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S20 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S21 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S22 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S23 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S24 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S25: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S26 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S27 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S28 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S29 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S30 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S31 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S32: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S33 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S34 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S35 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S36 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S37 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S38 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S39: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S40 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S41 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S42 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S43 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S44 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S45 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S46: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S47 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S48 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S49 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S50 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S51 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S52 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S53: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S54 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S55 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S56 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S57 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S58 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S59 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S60: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S61 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S62 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S63 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S64 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S65 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S66 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S67: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S68 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S69 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S70 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S71 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S72 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S73 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S74: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S75 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S76 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S77 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S78 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S79 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S80 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S81: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S82 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S83 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S84 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S85 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S86 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S87 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S88: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S89 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S90 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S91 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S92 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S93 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S94 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S95: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S96 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S97 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S98 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S99 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S100 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S101 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S102: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S103 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S104 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S105 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S106 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S107 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S108 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S109: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S110 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S111 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S112 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S113 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S114 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S115 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S116: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S117 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S118 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S119 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S120 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S121 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S122 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S123: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S124 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S125 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S126 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S127 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S128 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S129 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S130: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S131 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S132 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S133 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S134 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S135 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S136 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S137: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S138 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S139 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S140 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S141 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S142 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }
trait S143 { public ?Thing $tp = null; public function t(Base $b = new Base): Thing { return $this->tp ?? new Thing; } abstract public function u(): ?Thing; public static function v(): PDO|Thing|null { return null; } }
enum S144: string implements C { case A = "a"; const T = Thing::class; public function f(Thing|Base $x): self { return self::A; } public static function g(): ?Thing { return null; } }
#[Attr(Thing::class)] final class S145 { #[Attr(new Thing)] public Thing $p; public function __construct(#[Attr] ?Thing $t = null, #[Attr(Base::class), Attr] E|Thing|null $e = null) {} public function c(): \Closure { $zz = 1; return function (Thing $t) use (&$zz): ?Thing { return fn(Base $b): Base => $b; }; } }
final class S146 { public function m(): iterable { try { yield new Thing; } catch (E | \RuntimeException $e) { yield $e instanceof Thing; } finally { yield Thing::who(...); } } public function n(): \Closure { return static fn(Thing $t = new Thing, Base|C|null ...$more): Thing|Base|null => $t instanceof Base ? new Base : $t; } }
class S147 extends Base implements C { public function __construct(public readonly Thing $a, private ?Base $b = null, protected PDO|Thing|null $c = null) {} public function m(Thing|Base ...$r): ?Thing { return $r[0] ?? null; } public static function s(?PDO $p = null): static { return new static(new Thing); } }
/* Thing Base C docblock  */
abstract class S148 { abstract protected function a(Thing $t, Base|C|null $b = null): Thing|Base; public static ?Thing $s = null; public ?PDO $p = null; const Thing|string K = Thing::X; }
interface S149 extends C { public function f(Thing $t): ?Base; public static function g(PDO ...$p): Thing; const ?Base Z = null; }

$bad = []; $count = 0;
$chk = function (?ReflectionType $t, string $where) use (&$bad, &$count): void {
    if ($t === null) return;
    $count++;
    $s = (string) $t;
    if (str_contains($s, 'Orig\\') || preg_match('/(?<![\\\\\w])PDO/', $s)) $bad[] = "$where: $s";
};
foreach (get_declared_classes() as $cn) {
    if (!str_starts_with($cn, 'Stress\\S')) continue;
    $rc = new ReflectionClass($cn);
    foreach ($rc->getProperties() as $p) $chk($p->getType(), "$cn::\${$p->getName()}");
    foreach ($rc->getReflectionConstants() as $k) $chk($k->getType(), "$cn::{$k->getName()}");
    foreach ($rc->getMethods() as $m) {
        if ($m->getDeclaringClass()->getName() !== $cn) continue;
        $chk($m->getReturnType(), "$cn::{$m->getName()}()");
        foreach ($m->getParameters() as $p) $chk($p->getType(), "$cn::{$m->getName()}(\${$p->getName()})");
    }
    foreach ($rc->getAttributes() as $a) if (str_contains($a->getName(), 'Orig')) $bad[] = "$cn attr";
}
foreach (get_declared_interfaces() as $cn) {
    if (!str_starts_with($cn, 'Stress\\S')) continue;
    $rc = new ReflectionClass($cn);
    foreach ($rc->getMethods() as $m) { $chk($m->getReturnType(), "$cn::{$m->getName()}()"); foreach ($m->getParameters() as $p) $chk($p->getType(), "$cn::{$m->getName()}(\${$p->getName()})"); }
    foreach ($rc->getReflectionConstants() as $k) $chk($k->getType(), "$cn::{$k->getName()}");
}
foreach (get_declared_traits() as $cn) {
    if (!str_starts_with($cn, 'Stress\\S')) continue;
    $rc = new ReflectionClass($cn);
    foreach ($rc->getProperties() as $p) $chk($p->getType(), "$cn::\${$p->getName()}");
    foreach ($rc->getMethods() as $m) { $chk($m->getReturnType(), "$cn::{$m->getName()}()"); foreach ($m->getParameters() as $p) $chk($p->getType(), "$cn::{$m->getName()}(\${$p->getName()})"); }
}
echo "types checked: $count\n";
echo "bad: ", count($bad), "\n", implode("\n", array_slice($bad, 0, 10)), "\n";