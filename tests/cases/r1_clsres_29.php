<?php
namespace x\y {
    use Foo\Thing;
    use Orig\Sub;
    use Foo as Err;
    function f0_0(namespace\Tr $x) {}
    echo namespace\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f0_0'))->getParameters()[0]->getType(), "\n";
    function f0_1(sub\Foo $x) {}
    echo sub\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f0_1'))->getParameters()[0]->getType(), "\n";
    function f0_2(\orig\Foo $x) {}
    echo \orig\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f0_2'))->getParameters()[0]->getType(), "\n";
    function f0_3(Foo $x) {}
    echo Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f0_3'))->getParameters()[0]->getType(), "\n";
    function f0_4(Orig\Thing $x) {}
    echo Orig\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f0_4'))->getParameters()[0]->getType(), "\n";
    function f0_5(Attr $x) {}
    echo Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f0_5'))->getParameters()[0]->getType(), "\n";
}
namespace app {
    use \Foo as Sub;
    use Orig\Tr as Thing;
    function f1_0(Sub $x) {}
    echo Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f1_0'))->getParameters()[0]->getType(), "\n";
    function f1_1(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f1_1'))->getParameters()[0]->getType(), "\n";
    function f1_2(namespace\PDO $x) {}
    echo namespace\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f1_2'))->getParameters()[0]->getType(), "\n";
}
namespace x\y {
    use function Foo\Thing; use const Foo\Base;
    function f2_0(Foo $x) {}
    echo Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f2_0'))->getParameters()[0]->getType(), "\n";
    function f2_1(pdo $x) {}
    echo pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f2_1'))->getParameters()[0]->getType(), "\n";
    function f2_2(namespace\Foo $x) {}
    echo namespace\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f2_2'))->getParameters()[0]->getType(), "\n";
    function f2_3(Base $x) {}
    echo Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f2_3'))->getParameters()[0]->getType(), "\n";
}
namespace Repl {
    use Orig\Thing;
    use PDO;
    function f3_0(THING $x) {}
    echo THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f3_0'))->getParameters()[0]->getType(), "\n";
    function f3_1(pdo\Contract $x) {}
    echo pdo\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f3_1'))->getParameters()[0]->getType(), "\n";
    function f3_2(thing\PDO $x) {}
    echo thing\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f3_2'))->getParameters()[0]->getType(), "\n";
    function f3_3(Thing\Contract $x) {}
    echo Thing\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f3_3'))->getParameters()[0]->getType(), "\n";
}
namespace Orig\Sub {
    use \PDO;
    use Foo;
    function f4_0(foo\Foo $x) {}
    echo foo\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f4_0'))->getParameters()[0]->getType(), "\n";
    function f4_1(pdo\Other $x) {}
    echo pdo\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f4_1'))->getParameters()[0]->getType(), "\n";
    function f4_2(\orig\pdo $x) {}
    echo \orig\pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f4_2'))->getParameters()[0]->getType(), "\n";
    function f4_3(namespace\Foo $x) {}
    echo namespace\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f4_3'))->getParameters()[0]->getType(), "\n";
}
namespace ORIG {
    use x\y\Base as T;
    use Orig\Base as P;
    use Orig;
    function f5_0(t\Attr $x) {}
    echo t\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f5_0'))->getParameters()[0]->getType(), "\n";
    function f5_1(\Foo\Sub $x) {}
    echo \Foo\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f5_1'))->getParameters()[0]->getType(), "\n";
    function f5_2(Thing $x) {}
    echo Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f5_2'))->getParameters()[0]->getType(), "\n";
    function f5_3(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f5_3'))->getParameters()[0]->getType(), "\n";
    function f5_4(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f5_4'))->getParameters()[0]->getType(), "\n";
    function f5_5(namespace\Tr $x) {}
    echo namespace\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f5_5'))->getParameters()[0]->getType(), "\n";
}
namespace {
    use Orig\Sub as Sub;
    use Thing as Err;
    function f6_0(\Foo\THING $x) {}
    echo \Foo\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f6_0'))->getParameters()[0]->getType(), "\n";
    function f6_1(O\pdo $x) {}
    echo O\pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f6_1'))->getParameters()[0]->getType(), "\n";
    function f6_2(pdo $x) {}
    echo pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f6_2'))->getParameters()[0]->getType(), "\n";
}
namespace Repl {
    use Repl\Thing;
    use Orig;
    use Orig\Attr;
    use Orig\Base as Base;
    function f7_0(attr\Base $x) {}
    echo attr\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f7_0'))->getParameters()[0]->getType(), "\n";
    function f7_1(Tr $x) {}
    echo Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f7_1'))->getParameters()[0]->getType(), "\n";
    function f7_2(\Orig\Attr $x) {}
    echo \Orig\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f7_2'))->getParameters()[0]->getType(), "\n";
    function f7_3(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f7_3'))->getParameters()[0]->getType(), "\n";
    function f7_4(Attr $x) {}
    echo Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f7_4'))->getParameters()[0]->getType(), "\n";
    function f7_5(pdo $x) {}
    echo pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f7_5'))->getParameters()[0]->getType(), "\n";
}
namespace app {
    use Foo\Thing as pdo;
    use Foo\Thing as Foo;
    use \Orig\Sub;
    function f8_0(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f8_0'))->getParameters()[0]->getType(), "\n";
    function f8_1(foo\Other $x) {}
    echo foo\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f8_1'))->getParameters()[0]->getType(), "\n";
    function f8_2(\Orig\Err $x) {}
    echo \Orig\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f8_2'))->getParameters()[0]->getType(), "\n";
    function f8_3(\orig\Thing $x) {}
    echo \orig\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f8_3'))->getParameters()[0]->getType(), "\n";
    function f8_4(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f8_4'))->getParameters()[0]->getType(), "\n";
}
namespace x\y {
    function f9_0(Thing\THING $x) {}
    echo Thing\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f9_0'))->getParameters()[0]->getType(), "\n";
    function f9_1(O\Foo $x) {}
    echo O\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f9_1'))->getParameters()[0]->getType(), "\n";
    function f9_2(O\Attr $x) {}
    echo O\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f9_2'))->getParameters()[0]->getType(), "\n";
    function f9_3(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f9_3'))->getParameters()[0]->getType(), "\n";
    function f9_4(Base $x) {}
    echo Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f9_4'))->getParameters()[0]->getType(), "\n";
    function f9_5(\orig\Base $x) {}
    echo \orig\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f9_5'))->getParameters()[0]->getType(), "\n";
    function f9_6(O\Other $x) {}
    echo O\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f9_6'))->getParameters()[0]->getType(), "\n";
}
namespace app {
    use Orig\Attr;
    use Foo as Q;
    use Orig\Base as PDO;
    function f10_0(namespace\Thing $x) {}
    echo namespace\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f10_0'))->getParameters()[0]->getType(), "\n";
    function f10_1(Foo $x) {}
    echo Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f10_1'))->getParameters()[0]->getType(), "\n";
    function f10_2(\Thing $x) {}
    echo \Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f10_2'))->getParameters()[0]->getType(), "\n";
    function f10_3(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f10_3'))->getParameters()[0]->getType(), "\n";
    function f10_4(THING $x) {}
    echo THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f10_4'))->getParameters()[0]->getType(), "\n";
    function f10_5(pdo\THING $x) {}
    echo pdo\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f10_5'))->getParameters()[0]->getType(), "\n";
}
namespace {
    use ORIG\Contract as Thing;
    function f11_0(namespace\Contract $x) {}
    echo namespace\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f11_0'))->getParameters()[0]->getType(), "\n";
    function f11_1(Tr $x) {}
    echo Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f11_1'))->getParameters()[0]->getType(), "\n";
    function f11_2(\Foo\THING $x) {}
    echo \Foo\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f11_2'))->getParameters()[0]->getType(), "\n";
}
namespace Orig\Sub {
    use orig\err;
    use PDO as T;
    use PDO;
    use function Foo\Thing; use const Foo\Base;
    function f12_0(Attr $x) {}
    echo Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f12_0'))->getParameters()[0]->getType(), "\n";
    function f12_1(Tr $x) {}
    echo Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f12_1'))->getParameters()[0]->getType(), "\n";
    function f12_2(pdo\PDO $x) {}
    echo pdo\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f12_2'))->getParameters()[0]->getType(), "\n";
    function f12_3(O\Contract $x) {}
    echo O\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f12_3'))->getParameters()[0]->getType(), "\n";
}
namespace Orig {
    use ORIG\Contract;
    use \PDO;
    use \Repl\Thing as Base;
    use \ORIG\Contract as P;
    use Repl\Thing;
    use function Foo\Thing; use const Foo\Base;
    function f13_0(contract\Thing $x) {}
    echo contract\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f13_0'))->getParameters()[0]->getType(), "\n";
    function f13_1(base\Thing $x) {}
    echo base\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f13_1'))->getParameters()[0]->getType(), "\n";
    function f13_2(namespace\Thing $x) {}
    echo namespace\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f13_2'))->getParameters()[0]->getType(), "\n";
    function f13_3(Foo\Attr $x) {}
    echo Foo\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f13_3'))->getParameters()[0]->getType(), "\n";
    function f13_4(namespace\Thing $x) {}
    echo namespace\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f13_4'))->getParameters()[0]->getType(), "\n";
    function f13_5(\Orig\Thing $x) {}
    echo \Orig\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f13_5'))->getParameters()[0]->getType(), "\n";
    function f13_6(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f13_6'))->getParameters()[0]->getType(), "\n";
}
namespace app {
    use Orig\Attr as Foo;
    use Foo\Thing as Sub;
    use x\y\Base;
    function f14_0(\Foo\Attr $x) {}
    echo \Foo\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f14_0'))->getParameters()[0]->getType(), "\n";
    function f14_1(\Foo\pdo $x) {}
    echo \Foo\pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f14_1'))->getParameters()[0]->getType(), "\n";
    function f14_2(foo\Tr $x) {}
    echo foo\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f14_2'))->getParameters()[0]->getType(), "\n";
}
namespace app {
    use \Thing;
    function f15_0(Foo $x) {}
    echo Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f15_0'))->getParameters()[0]->getType(), "\n";
    function f15_1(namespace\Foo $x) {}
    echo namespace\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f15_1'))->getParameters()[0]->getType(), "\n";
    function f15_2(namespace\PDO $x) {}
    echo namespace\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f15_2'))->getParameters()[0]->getType(), "\n";
    function f15_3(thing\pdo $x) {}
    echo thing\pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f15_3'))->getParameters()[0]->getType(), "\n";
    function f15_4(Orig\Tr $x) {}
    echo Orig\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f15_4'))->getParameters()[0]->getType(), "\n";
    function f15_5(\orig\Other $x) {}
    echo \orig\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f15_5'))->getParameters()[0]->getType(), "\n";
    function f15_6(namespace\PDO $x) {}
    echo namespace\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f15_6'))->getParameters()[0]->getType(), "\n";
}
namespace Orig {
    use Thing;
    use Orig\Sub as pdo;
    function f16_0(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f16_0'))->getParameters()[0]->getType(), "\n";
    function f16_1(namespace\Sub $x) {}
    echo namespace\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f16_1'))->getParameters()[0]->getType(), "\n";
    function f16_2(\Foo\Other $x) {}
    echo \Foo\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f16_2'))->getParameters()[0]->getType(), "\n";
    function f16_3(thing\Err $x) {}
    echo thing\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f16_3'))->getParameters()[0]->getType(), "\n";
    function f16_4(Base $x) {}
    echo Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f16_4'))->getParameters()[0]->getType(), "\n";
}
namespace ORIG {
    use Orig\Tr;
    use \Orig;
    function f17_0(Foo\Foo $x) {}
    echo Foo\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f17_0'))->getParameters()[0]->getType(), "\n";
    function f17_1(orig\pdo $x) {}
    echo orig\pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f17_1'))->getParameters()[0]->getType(), "\n";
    function f17_2(orig\Tr $x) {}
    echo orig\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f17_2'))->getParameters()[0]->getType(), "\n";
    function f17_3(THING $x) {}
    echo THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f17_3'))->getParameters()[0]->getType(), "\n";
    function f17_4(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f17_4'))->getParameters()[0]->getType(), "\n";
    function f17_5(\Orig\PDO $x) {}
    echo \Orig\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f17_5'))->getParameters()[0]->getType(), "\n";
    function f17_6(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f17_6'))->getParameters()[0]->getType(), "\n";
}
namespace pdo {
    use Orig\Attr as T;
    use function Foo\Thing; use const Foo\Base;
    function f18_0(namespace\Thing $x) {}
    echo namespace\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f18_0'))->getParameters()[0]->getType(), "\n";
    function f18_1(O\Tr $x) {}
    echo O\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f18_1'))->getParameters()[0]->getType(), "\n";
    function f18_2(\Sub $x) {}
    echo \Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f18_2'))->getParameters()[0]->getType(), "\n";
}
namespace Orig\Sub {
    use Orig\Attr as Foo;
    use \ORIG\Contract;
    function f19_0(namespace\Attr $x) {}
    echo namespace\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f19_0'))->getParameters()[0]->getType(), "\n";
    function f19_1(Other $x) {}
    echo Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f19_1'))->getParameters()[0]->getType(), "\n";
    function f19_2(namespace\Base $x) {}
    echo namespace\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f19_2'))->getParameters()[0]->getType(), "\n";
    function f19_3(Sub $x) {}
    echo Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f19_3'))->getParameters()[0]->getType(), "\n";
}
namespace Orig {
    use Repl\Thing as Thing;
    use orig\err;
    use Repl\Thing as Foo;
    use PDO as Q;
    function f20_0(\THING $x) {}
    echo \THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f20_0'))->getParameters()[0]->getType(), "\n";
    function f20_1(Sub\PDO $x) {}
    echo Sub\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f20_1'))->getParameters()[0]->getType(), "\n";
    function f20_2(Sub\Base $x) {}
    echo Sub\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f20_2'))->getParameters()[0]->getType(), "\n";
    function f20_3(Other $x) {}
    echo Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f20_3'))->getParameters()[0]->getType(), "\n";
}
namespace Orig {
    use function Foo\Thing; use const Foo\Base;
    function f21_0(Thing\Sub $x) {}
    echo Thing\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f21_0'))->getParameters()[0]->getType(), "\n";
    function f21_1(Thing\Contract $x) {}
    echo Thing\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f21_1'))->getParameters()[0]->getType(), "\n";
    function f21_2(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f21_2'))->getParameters()[0]->getType(), "\n";
    function f21_3(namespace\Tr $x) {}
    echo namespace\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f21_3'))->getParameters()[0]->getType(), "\n";
}
namespace app {
    use \Orig\Thing as Sub;
    use Foo;
    use Foo\Thing;
    use Foo as PDO;
    use Orig;
    function f22_0(\Err $x) {}
    echo \Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f22_0'))->getParameters()[0]->getType(), "\n";
    function f22_1(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f22_1'))->getParameters()[0]->getType(), "\n";
    function f22_2(pdo\Other $x) {}
    echo pdo\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f22_2'))->getParameters()[0]->getType(), "\n";
    function f22_3(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f22_3'))->getParameters()[0]->getType(), "\n";
}
namespace Orig {
    function f23_0(Foo $x) {}
    echo Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f23_0'))->getParameters()[0]->getType(), "\n";
    function f23_1(Sub $x) {}
    echo Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f23_1'))->getParameters()[0]->getType(), "\n";
    function f23_2(Thing\Attr $x) {}
    echo Thing\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f23_2'))->getParameters()[0]->getType(), "\n";
    function f23_3(namespace\THING $x) {}
    echo namespace\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f23_3'))->getParameters()[0]->getType(), "\n";
    function f23_4(\Orig\Foo $x) {}
    echo \Orig\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f23_4'))->getParameters()[0]->getType(), "\n";
    function f23_5(Thing\Tr $x) {}
    echo Thing\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f23_5'))->getParameters()[0]->getType(), "\n";
    function f23_6(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f23_6'))->getParameters()[0]->getType(), "\n";
}
namespace x\y {
    use Repl\Thing as Base;
    use \Foo\Thing;
    use \Foo;
    use function Foo\Thing; use const Foo\Base;
    function f24_0(thing\Tr $x) {}
    echo thing\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f24_0'))->getParameters()[0]->getType(), "\n";
    function f24_1(x\Other $x) {}
    echo x\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f24_1'))->getParameters()[0]->getType(), "\n";
    function f24_2(Thing\Sub $x) {}
    echo Thing\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f24_2'))->getParameters()[0]->getType(), "\n";
    function f24_3(namespace\Other $x) {}
    echo namespace\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f24_3'))->getParameters()[0]->getType(), "\n";
}
namespace Repl {
    use function Foo\Thing; use const Foo\Base;
    function f25_0(Orig\Thing $x) {}
    echo Orig\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f25_0'))->getParameters()[0]->getType(), "\n";
    function f25_1(Thing\Other $x) {}
    echo Thing\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f25_1'))->getParameters()[0]->getType(), "\n";
    function f25_2(namespace\Attr $x) {}
    echo namespace\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f25_2'))->getParameters()[0]->getType(), "\n";
    function f25_3(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f25_3'))->getParameters()[0]->getType(), "\n";
}
namespace Orig {
    use Foo;
    use Foo as PDO;
    use Orig\Tr;
    function f26_0(Attr $x) {}
    echo Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f26_0'))->getParameters()[0]->getType(), "\n";
    function f26_1(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f26_1'))->getParameters()[0]->getType(), "\n";
    function f26_2(foo\Tr $x) {}
    echo foo\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f26_2'))->getParameters()[0]->getType(), "\n";
    function f26_3(pdo\Foo $x) {}
    echo pdo\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f26_3'))->getParameters()[0]->getType(), "\n";
    function f26_4(THING $x) {}
    echo THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f26_4'))->getParameters()[0]->getType(), "\n";
    function f26_5(namespace\pdo $x) {}
    echo namespace\pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f26_5'))->getParameters()[0]->getType(), "\n";
}
namespace {
    use function Foo\Thing; use const Foo\Base;
    function f27_0(\Foo\Err $x) {}
    echo \Foo\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f27_0'))->getParameters()[0]->getType(), "\n";
    function f27_1(namespace\Attr $x) {}
    echo namespace\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f27_1'))->getParameters()[0]->getType(), "\n";
    function f27_2(\Foo\Contract $x) {}
    echo \Foo\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f27_2'))->getParameters()[0]->getType(), "\n";
    function f27_3(namespace\Foo $x) {}
    echo namespace\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f27_3'))->getParameters()[0]->getType(), "\n";
    function f27_4(Thing $x) {}
    echo Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f27_4'))->getParameters()[0]->getType(), "\n";
    function f27_5(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f27_5'))->getParameters()[0]->getType(), "\n";
    function f27_6(Tr $x) {}
    echo Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f27_6'))->getParameters()[0]->getType(), "\n";
}
namespace pdo {
    use Orig;
    use Thing;
    use \x\y\Base;
    use \Orig\Sub as Sub;
    function f28_0(Foo $x) {}
    echo Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f28_0'))->getParameters()[0]->getType(), "\n";
    function f28_1(O\Contract $x) {}
    echo O\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f28_1'))->getParameters()[0]->getType(), "\n";
    function f28_2(Thing $x) {}
    echo Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f28_2'))->getParameters()[0]->getType(), "\n";
    function f28_3(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f28_3'))->getParameters()[0]->getType(), "\n";
    function f28_4(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f28_4'))->getParameters()[0]->getType(), "\n";
    function f28_5(\Foo\Foo $x) {}
    echo \Foo\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f28_5'))->getParameters()[0]->getType(), "\n";
    function f28_6(Tr $x) {}
    echo Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f28_6'))->getParameters()[0]->getType(), "\n";
}
namespace {
    use function Foo\Thing; use const Foo\Base;
    function f29_0(pdo $x) {}
    echo pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f29_0'))->getParameters()[0]->getType(), "\n";
    function f29_1(Thing\Tr $x) {}
    echo Thing\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f29_1'))->getParameters()[0]->getType(), "\n";
    function f29_2(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f29_2'))->getParameters()[0]->getType(), "\n";
    function f29_3(Foo\Base $x) {}
    echo Foo\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f29_3'))->getParameters()[0]->getType(), "\n";
    function f29_4(\Foo $x) {}
    echo \Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f29_4'))->getParameters()[0]->getType(), "\n";
}
namespace x\y {
    use \Orig\Tr;
    use x\y\Base as Thing;
    use Orig\Base as Z;
    use function Foo\Thing; use const Foo\Base;
    function f30_0(Sub $x) {}
    echo Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f30_0'))->getParameters()[0]->getType(), "\n";
    function f30_1(Thing $x) {}
    echo Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f30_1'))->getParameters()[0]->getType(), "\n";
    function f30_2(\Foo $x) {}
    echo \Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f30_2'))->getParameters()[0]->getType(), "\n";
    function f30_3(\orig\PDO $x) {}
    echo \orig\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f30_3'))->getParameters()[0]->getType(), "\n";
    function f30_4(pdo $x) {}
    echo pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f30_4'))->getParameters()[0]->getType(), "\n";
    function f30_5(\Thing $x) {}
    echo \Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f30_5'))->getParameters()[0]->getType(), "\n";
}
namespace app {
    use \Repl\Thing;
    use Orig\Tr;
    use function Foo\Thing; use const Foo\Base;
    function f31_0(namespace\Attr $x) {}
    echo namespace\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f31_0'))->getParameters()[0]->getType(), "\n";
    function f31_1(thing\Thing $x) {}
    echo thing\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f31_1'))->getParameters()[0]->getType(), "\n";
    function f31_2(tr\Attr $x) {}
    echo tr\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f31_2'))->getParameters()[0]->getType(), "\n";
    function f31_3(O\Thing $x) {}
    echo O\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f31_3'))->getParameters()[0]->getType(), "\n";
    function f31_4(Other $x) {}
    echo Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f31_4'))->getParameters()[0]->getType(), "\n";
    function f31_5(namespace\Tr $x) {}
    echo namespace\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f31_5'))->getParameters()[0]->getType(), "\n";
}
namespace {
    use \x\y\Base;
    use function Foo\Thing; use const Foo\Base;
    function f32_0(Sub\PDO $x) {}
    echo Sub\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f32_0'))->getParameters()[0]->getType(), "\n";
    function f32_1(Base $x) {}
    echo Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f32_1'))->getParameters()[0]->getType(), "\n";
    function f32_2(x\Contract $x) {}
    echo x\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f32_2'))->getParameters()[0]->getType(), "\n";
    function f32_3(Orig\PDO $x) {}
    echo Orig\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f32_3'))->getParameters()[0]->getType(), "\n";
}
namespace Repl {
    use function Foo\Thing; use const Foo\Base;
    function f33_0(THING $x) {}
    echo THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f33_0'))->getParameters()[0]->getType(), "\n";
    function f33_1(\Thing $x) {}
    echo \Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f33_1'))->getParameters()[0]->getType(), "\n";
    function f33_2(O\Attr $x) {}
    echo O\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f33_2'))->getParameters()[0]->getType(), "\n";
    function f33_3(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f33_3'))->getParameters()[0]->getType(), "\n";
    function f33_4(Thing\Err $x) {}
    echo Thing\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f33_4'))->getParameters()[0]->getType(), "\n";
    function f33_5(\Foo\Contract $x) {}
    echo \Foo\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f33_5'))->getParameters()[0]->getType(), "\n";
    function f33_6(namespace\Base $x) {}
    echo namespace\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f33_6'))->getParameters()[0]->getType(), "\n";
}
namespace x\y {
    use \Thing;
    use Foo;
    use \Foo as P;
    function f34_0(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f34_0'))->getParameters()[0]->getType(), "\n";
    function f34_1(\orig\Sub $x) {}
    echo \orig\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f34_1'))->getParameters()[0]->getType(), "\n";
    function f34_2(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f34_2'))->getParameters()[0]->getType(), "\n";
    function f34_3(foo\Other $x) {}
    echo foo\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f34_3'))->getParameters()[0]->getType(), "\n";
    function f34_4(Orig\PDO $x) {}
    echo Orig\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f34_4'))->getParameters()[0]->getType(), "\n";
    function f34_5(Sub\Base $x) {}
    echo Sub\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f34_5'))->getParameters()[0]->getType(), "\n";
    function f34_6(namespace\PDO $x) {}
    echo namespace\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f34_6'))->getParameters()[0]->getType(), "\n";
}
namespace {
    function f35_0(Tr $x) {}
    echo Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f35_0'))->getParameters()[0]->getType(), "\n";
    function f35_1(Sub $x) {}
    echo Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f35_1'))->getParameters()[0]->getType(), "\n";
    function f35_2(Sub\Sub $x) {}
    echo Sub\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f35_2'))->getParameters()[0]->getType(), "\n";
    function f35_3(Thing\Attr $x) {}
    echo Thing\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f35_3'))->getParameters()[0]->getType(), "\n";
}
namespace {
    use \Orig\Base;
    use PDO as Foo;
    use PDO as O;
    use function Foo\Thing; use const Foo\Base;
    function f36_0(Thing $x) {}
    echo Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f36_0'))->getParameters()[0]->getType(), "\n";
    function f36_1(Base $x) {}
    echo Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f36_1'))->getParameters()[0]->getType(), "\n";
    function f36_2(Sub\Tr $x) {}
    echo Sub\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f36_2'))->getParameters()[0]->getType(), "\n";
    function f36_3(\pdo $x) {}
    echo \pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f36_3'))->getParameters()[0]->getType(), "\n";
    function f36_4(Thing\Contract $x) {}
    echo Thing\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f36_4'))->getParameters()[0]->getType(), "\n";
    function f36_5(namespace\THING $x) {}
    echo namespace\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f36_5'))->getParameters()[0]->getType(), "\n";
    function f36_6(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f36_6'))->getParameters()[0]->getType(), "\n";
}
namespace Orig {
    use Orig as P;
    use \Repl\Thing;
    use PDO as PDO;
    use Foo as Orig;
    use Repl\Thing as T;
    use function Foo\Thing; use const Foo\Base;
    function f37_0(namespace\Attr $x) {}
    echo namespace\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f37_0'))->getParameters()[0]->getType(), "\n";
    function f37_1(Sub\Contract $x) {}
    echo Sub\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f37_1'))->getParameters()[0]->getType(), "\n";
    function f37_2(Thing $x) {}
    echo Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f37_2'))->getParameters()[0]->getType(), "\n";
}
namespace {
    use ORIG\Contract as Orig;
    use function Foo\Thing; use const Foo\Base;
    function f38_0(orig\Err $x) {}
    echo orig\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f38_0'))->getParameters()[0]->getType(), "\n";
    function f38_1(Thing $x) {}
    echo Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f38_1'))->getParameters()[0]->getType(), "\n";
    function f38_2(namespace\Sub $x) {}
    echo namespace\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f38_2'))->getParameters()[0]->getType(), "\n";
    function f38_3(orig\Base $x) {}
    echo orig\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f38_3'))->getParameters()[0]->getType(), "\n";
    function f38_4(\Foo\Thing $x) {}
    echo \Foo\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f38_4'))->getParameters()[0]->getType(), "\n";
    function f38_5(Orig\Err $x) {}
    echo Orig\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f38_5'))->getParameters()[0]->getType(), "\n";
}
namespace Repl {
    use function Foo\Thing; use const Foo\Base;
    function f39_0(\Foo $x) {}
    echo \Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f39_0'))->getParameters()[0]->getType(), "\n";
    function f39_1(namespace\Other $x) {}
    echo namespace\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f39_1'))->getParameters()[0]->getType(), "\n";
    function f39_2(Sub\Sub $x) {}
    echo Sub\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f39_2'))->getParameters()[0]->getType(), "\n";
    function f39_3(\Foo\Other $x) {}
    echo \Foo\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f39_3'))->getParameters()[0]->getType(), "\n";
    function f39_4(Base $x) {}
    echo Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f39_4'))->getParameters()[0]->getType(), "\n";
}
namespace app {
    use Foo\Thing as Err;
    function f40_0(namespace\Attr $x) {}
    echo namespace\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f40_0'))->getParameters()[0]->getType(), "\n";
    function f40_1(\orig\Err $x) {}
    echo \orig\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f40_1'))->getParameters()[0]->getType(), "\n";
    function f40_2(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f40_2'))->getParameters()[0]->getType(), "\n";
    function f40_3(\Contract $x) {}
    echo \Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f40_3'))->getParameters()[0]->getType(), "\n";
    function f40_4(Foo\Attr $x) {}
    echo Foo\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f40_4'))->getParameters()[0]->getType(), "\n";
}
namespace x\y {
    use ORIG\Contract;
    use Orig\Sub;
    use Orig\Tr as B;
    function f41_0(Other $x) {}
    echo Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f41_0'))->getParameters()[0]->getType(), "\n";
    function f41_1(namespace\Thing $x) {}
    echo namespace\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f41_1'))->getParameters()[0]->getType(), "\n";
    function f41_2(\Orig\Contract $x) {}
    echo \Orig\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f41_2'))->getParameters()[0]->getType(), "\n";
    function f41_3(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f41_3'))->getParameters()[0]->getType(), "\n";
}
namespace Orig {
    use PDO;
    use PDO as B;
    use function Foo\Thing; use const Foo\Base;
    function f42_0(namespace\THING $x) {}
    echo namespace\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f42_0'))->getParameters()[0]->getType(), "\n";
    function f42_1(\Foo\Sub $x) {}
    echo \Foo\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f42_1'))->getParameters()[0]->getType(), "\n";
    function f42_2(pdo\Err $x) {}
    echo pdo\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f42_2'))->getParameters()[0]->getType(), "\n";
    function f42_3(namespace\Other $x) {}
    echo namespace\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f42_3'))->getParameters()[0]->getType(), "\n";
    function f42_4(pdo $x) {}
    echo pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f42_4'))->getParameters()[0]->getType(), "\n";
    function f42_5(namespace\Foo $x) {}
    echo namespace\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f42_5'))->getParameters()[0]->getType(), "\n";
    function f42_6(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f42_6'))->getParameters()[0]->getType(), "\n";
}
namespace app {
    use x\y\Base;
    use Orig as Orig;
    function f43_0(\orig\Tr $x) {}
    echo \orig\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f43_0'))->getParameters()[0]->getType(), "\n";
    function f43_1(namespace\PDO $x) {}
    echo namespace\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f43_1'))->getParameters()[0]->getType(), "\n";
    function f43_2(namespace\THING $x) {}
    echo namespace\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f43_2'))->getParameters()[0]->getType(), "\n";
}
namespace Orig\Sub {
    use PDO;
    use PDO as P;
    function f44_0(Other $x) {}
    echo Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f44_0'))->getParameters()[0]->getType(), "\n";
    function f44_1(pdo\Sub $x) {}
    echo pdo\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f44_1'))->getParameters()[0]->getType(), "\n";
    function f44_2(pdo\Attr $x) {}
    echo pdo\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f44_2'))->getParameters()[0]->getType(), "\n";
    function f44_3(\Orig\Thing $x) {}
    echo \Orig\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f44_3'))->getParameters()[0]->getType(), "\n";
    function f44_4(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f44_4'))->getParameters()[0]->getType(), "\n";
}
namespace Orig\Sub {
    use Orig\Base;
    use function Foo\Thing; use const Foo\Base;
    function f45_0(base\Contract $x) {}
    echo base\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f45_0'))->getParameters()[0]->getType(), "\n";
    function f45_1(\THING $x) {}
    echo \THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f45_1'))->getParameters()[0]->getType(), "\n";
    function f45_2(base\Thing $x) {}
    echo base\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f45_2'))->getParameters()[0]->getType(), "\n";
}
namespace Orig {
    use Repl\Thing as Sub;
    use Foo\Thing;
    use \Orig\Sub as Base;
    use Foo;
    use function Foo\Thing; use const Foo\Base;
    function f46_0(base\Err $x) {}
    echo base\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f46_0'))->getParameters()[0]->getType(), "\n";
    function f46_1(foo\Sub $x) {}
    echo foo\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f46_1'))->getParameters()[0]->getType(), "\n";
    function f46_2(base\THING $x) {}
    echo base\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f46_2'))->getParameters()[0]->getType(), "\n";
    function f46_3(\orig\THING $x) {}
    echo \orig\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f46_3'))->getParameters()[0]->getType(), "\n";
    function f46_4(\Orig\Tr $x) {}
    echo \Orig\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f46_4'))->getParameters()[0]->getType(), "\n";
    function f46_5(thing\Tr $x) {}
    echo thing\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f46_5'))->getParameters()[0]->getType(), "\n";
    function f46_6(base\Tr $x) {}
    echo base\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f46_6'))->getParameters()[0]->getType(), "\n";
}
namespace {
    use Foo as O;
    use Repl\Thing;
    use Orig\Sub as Sub;
    use Orig\Tr;
    function f47_0(O\Thing $x) {}
    echo O\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f47_0'))->getParameters()[0]->getType(), "\n";
    function f47_1(\Foo\PDO $x) {}
    echo \Foo\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f47_1'))->getParameters()[0]->getType(), "\n";
    function f47_2(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f47_2'))->getParameters()[0]->getType(), "\n";
    function f47_3(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f47_3'))->getParameters()[0]->getType(), "\n";
    function f47_4(Sub $x) {}
    echo Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f47_4'))->getParameters()[0]->getType(), "\n";
}
namespace ORIG {
    use x\y\Base as Base;
    use Repl\Thing as B;
    function f48_0(Sub $x) {}
    echo Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f48_0'))->getParameters()[0]->getType(), "\n";
    function f48_1(base\Sub $x) {}
    echo base\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f48_1'))->getParameters()[0]->getType(), "\n";
    function f48_2(namespace\Other $x) {}
    echo namespace\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f48_2'))->getParameters()[0]->getType(), "\n";
    function f48_3(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f48_3'))->getParameters()[0]->getType(), "\n";
    function f48_4(x\Err $x) {}
    echo x\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f48_4'))->getParameters()[0]->getType(), "\n";
    function f48_5(namespace\Foo $x) {}
    echo namespace\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f48_5'))->getParameters()[0]->getType(), "\n";
}
namespace ORIG {
    use \Orig\Thing as Thing;
    use Orig\Attr;
    use function Foo\Thing; use const Foo\Base;
    function f49_0(Foo\Attr $x) {}
    echo Foo\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f49_0'))->getParameters()[0]->getType(), "\n";
    function f49_1(namespace\Base $x) {}
    echo namespace\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f49_1'))->getParameters()[0]->getType(), "\n";
    function f49_2(Thing\Sub $x) {}
    echo Thing\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f49_2'))->getParameters()[0]->getType(), "\n";
    function f49_3(Other $x) {}
    echo Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f49_3'))->getParameters()[0]->getType(), "\n";
}
namespace Orig {
    use Orig\Sub as Foo;
    use x\y\Base as Orig;
    function f50_0(foo\Base $x) {}
    echo foo\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f50_0'))->getParameters()[0]->getType(), "\n";
    function f50_1(Foo\THING $x) {}
    echo Foo\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f50_1'))->getParameters()[0]->getType(), "\n";
    function f50_2(namespace\Tr $x) {}
    echo namespace\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f50_2'))->getParameters()[0]->getType(), "\n";
}
namespace x\y {
    use x\y\Base as T;
    use Orig\Attr as B;
    use Orig as O;
    use function Foo\Thing; use const Foo\Base;
    function f51_0(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f51_0'))->getParameters()[0]->getType(), "\n";
    function f51_1(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f51_1'))->getParameters()[0]->getType(), "\n";
    function f51_2(Thing $x) {}
    echo Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f51_2'))->getParameters()[0]->getType(), "\n";
}
namespace x\y {
    use Orig\Base;
    use Orig\Base as Sub;
    use ORIG\Contract;
    use Orig\Thing;
    use function Foo\Thing; use const Foo\Base;
    function f52_0(\Orig\pdo $x) {}
    echo \Orig\pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f52_0'))->getParameters()[0]->getType(), "\n";
    function f52_1(Attr $x) {}
    echo Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f52_1'))->getParameters()[0]->getType(), "\n";
    function f52_2(Base $x) {}
    echo Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f52_2'))->getParameters()[0]->getType(), "\n";
}
namespace app {
    use PDO as Z;
    use \Repl\Thing as Q;
    use Orig\Base as Orig;
    use ORIG\Contract as pdo;
    function f53_0(Tr $x) {}
    echo Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f53_0'))->getParameters()[0]->getType(), "\n";
    function f53_1(Attr $x) {}
    echo Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f53_1'))->getParameters()[0]->getType(), "\n";
    function f53_2(namespace\PDO $x) {}
    echo namespace\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f53_2'))->getParameters()[0]->getType(), "\n";
    function f53_3(namespace\Other $x) {}
    echo namespace\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f53_3'))->getParameters()[0]->getType(), "\n";
    function f53_4(\Foo\PDO $x) {}
    echo \Foo\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f53_4'))->getParameters()[0]->getType(), "\n";
}
namespace Orig {
    use Orig\Tr;
    use function Foo\Thing; use const Foo\Base;
    function f54_0(namespace\Base $x) {}
    echo namespace\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f54_0'))->getParameters()[0]->getType(), "\n";
    function f54_1(namespace\PDO $x) {}
    echo namespace\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f54_1'))->getParameters()[0]->getType(), "\n";
    function f54_2(\Tr $x) {}
    echo \Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f54_2'))->getParameters()[0]->getType(), "\n";
    function f54_3(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f54_3'))->getParameters()[0]->getType(), "\n";
    function f54_4(O\Sub $x) {}
    echo O\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f54_4'))->getParameters()[0]->getType(), "\n";
    function f54_5(THING $x) {}
    echo THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f54_5'))->getParameters()[0]->getType(), "\n";
}
namespace Repl {
    function f55_0(\Sub $x) {}
    echo \Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f55_0'))->getParameters()[0]->getType(), "\n";
    function f55_1(Thing\Contract $x) {}
    echo Thing\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f55_1'))->getParameters()[0]->getType(), "\n";
    function f55_2(Sub $x) {}
    echo Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f55_2'))->getParameters()[0]->getType(), "\n";
    function f55_3(Thing\Err $x) {}
    echo Thing\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f55_3'))->getParameters()[0]->getType(), "\n";
    function f55_4(Thing\Thing $x) {}
    echo Thing\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f55_4'))->getParameters()[0]->getType(), "\n";
    function f55_5(THING $x) {}
    echo THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f55_5'))->getParameters()[0]->getType(), "\n";
    function f55_6(Orig\Attr $x) {}
    echo Orig\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f55_6'))->getParameters()[0]->getType(), "\n";
}
namespace ORIG {
    use function Foo\Thing; use const Foo\Base;
    function f56_0(Other $x) {}
    echo Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f56_0'))->getParameters()[0]->getType(), "\n";
    function f56_1(O\Other $x) {}
    echo O\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f56_1'))->getParameters()[0]->getType(), "\n";
    function f56_2(Base $x) {}
    echo Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f56_2'))->getParameters()[0]->getType(), "\n";
}
namespace {
    use PDO as Z;
    use \orig\err;
    use Foo as P;
    use \Orig\Base as Q;
    use function Foo\Thing; use const Foo\Base;
    function f57_0(\Foo\Base $x) {}
    echo \Foo\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f57_0'))->getParameters()[0]->getType(), "\n";
    function f57_1(namespace\Attr $x) {}
    echo namespace\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f57_1'))->getParameters()[0]->getType(), "\n";
    function f57_2(\orig\Foo $x) {}
    echo \orig\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f57_2'))->getParameters()[0]->getType(), "\n";
    function f57_3(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f57_3'))->getParameters()[0]->getType(), "\n";
}
namespace ORIG {
    use Orig\Sub as Sub;
    use \Orig\Tr;
    function f58_0(Thing $x) {}
    echo Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f58_0'))->getParameters()[0]->getType(), "\n";
    function f58_1(Attr $x) {}
    echo Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f58_1'))->getParameters()[0]->getType(), "\n";
    function f58_2(\Orig\Sub $x) {}
    echo \Orig\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f58_2'))->getParameters()[0]->getType(), "\n";
    function f58_3(\Foo\Tr $x) {}
    echo \Foo\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f58_3'))->getParameters()[0]->getType(), "\n";
    function f58_4(tr\Other $x) {}
    echo tr\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f58_4'))->getParameters()[0]->getType(), "\n";
    function f58_5(Base $x) {}
    echo Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f58_5'))->getParameters()[0]->getType(), "\n";
    function f58_6(Other $x) {}
    echo Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f58_6'))->getParameters()[0]->getType(), "\n";
}
namespace Repl {
    use \orig\err;
    use x\y\Base;
    function f59_0(O\pdo $x) {}
    echo O\pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f59_0'))->getParameters()[0]->getType(), "\n";
    function f59_1(\Foo\THING $x) {}
    echo \Foo\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f59_1'))->getParameters()[0]->getType(), "\n";
    function f59_2(base\Other $x) {}
    echo base\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f59_2'))->getParameters()[0]->getType(), "\n";
    function f59_3(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f59_3'))->getParameters()[0]->getType(), "\n";
    function f59_4(Orig\Tr $x) {}
    echo Orig\Tr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f59_4'))->getParameters()[0]->getType(), "\n";
    function f59_5(Sub\Thing $x) {}
    echo Sub\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f59_5'))->getParameters()[0]->getType(), "\n";
}
namespace pdo {
    function f60_0(THING $x) {}
    echo THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f60_0'))->getParameters()[0]->getType(), "\n";
    function f60_1(\Foo\Other $x) {}
    echo \Foo\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f60_1'))->getParameters()[0]->getType(), "\n";
    function f60_2(THING $x) {}
    echo THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f60_2'))->getParameters()[0]->getType(), "\n";
    function f60_3(namespace\Foo $x) {}
    echo namespace\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f60_3'))->getParameters()[0]->getType(), "\n";
    function f60_4(namespace\Err $x) {}
    echo namespace\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f60_4'))->getParameters()[0]->getType(), "\n";
}
namespace x\y {
    use Foo;
    use \Orig;
    use x\y\Base;
    function f61_0(base\Sub $x) {}
    echo base\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f61_0'))->getParameters()[0]->getType(), "\n";
    function f61_1(\Foo\Thing $x) {}
    echo \Foo\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f61_1'))->getParameters()[0]->getType(), "\n";
    function f61_2(x\Attr $x) {}
    echo x\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f61_2'))->getParameters()[0]->getType(), "\n";
    function f61_3(Orig\THING $x) {}
    echo Orig\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f61_3'))->getParameters()[0]->getType(), "\n";
    function f61_4(namespace\THING $x) {}
    echo namespace\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f61_4'))->getParameters()[0]->getType(), "\n";
    function f61_5(Foo\Err $x) {}
    echo Foo\Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f61_5'))->getParameters()[0]->getType(), "\n";
}
namespace pdo {
    use PDO;
    use Foo\Thing;
    use function Foo\Thing; use const Foo\Base;
    function f62_0(pdo\Other $x) {}
    echo pdo\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f62_0'))->getParameters()[0]->getType(), "\n";
    function f62_1(Foo $x) {}
    echo Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f62_1'))->getParameters()[0]->getType(), "\n";
    function f62_2(thing\THING $x) {}
    echo thing\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f62_2'))->getParameters()[0]->getType(), "\n";
    function f62_3(PDO $x) {}
    echo PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f62_3'))->getParameters()[0]->getType(), "\n";
    function f62_4(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f62_4'))->getParameters()[0]->getType(), "\n";
}
namespace pdo {
    function f63_0(\Foo\Sub $x) {}
    echo \Foo\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f63_0'))->getParameters()[0]->getType(), "\n";
    function f63_1(Sub $x) {}
    echo Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f63_1'))->getParameters()[0]->getType(), "\n";
    function f63_2(Thing $x) {}
    echo Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f63_2'))->getParameters()[0]->getType(), "\n";
    function f63_3(\Foo\Thing $x) {}
    echo \Foo\Thing::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f63_3'))->getParameters()[0]->getType(), "\n";
    function f63_4(pdo $x) {}
    echo pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f63_4'))->getParameters()[0]->getType(), "\n";
}
namespace Repl {
    function f64_0(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f64_0'))->getParameters()[0]->getType(), "\n";
    function f64_1(pdo $x) {}
    echo pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f64_1'))->getParameters()[0]->getType(), "\n";
    function f64_2(Err $x) {}
    echo Err::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f64_2'))->getParameters()[0]->getType(), "\n";
    function f64_3(\orig\THING $x) {}
    echo \orig\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f64_3'))->getParameters()[0]->getType(), "\n";
    function f64_4(Thing\Base $x) {}
    echo Thing\Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f64_4'))->getParameters()[0]->getType(), "\n";
    function f64_5(Foo\Attr $x) {}
    echo Foo\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f64_5'))->getParameters()[0]->getType(), "\n";
}
namespace {
    use ORIG\Contract;
    use Foo as Foo;
    use \Orig\Base;
    use Foo as PDO;
    function f65_0(Sub\Contract $x) {}
    echo Sub\Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f65_0'))->getParameters()[0]->getType(), "\n";
    function f65_1(Orig\Attr $x) {}
    echo Orig\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f65_1'))->getParameters()[0]->getType(), "\n";
    function f65_2(\Foo\Foo $x) {}
    echo \Foo\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f65_2'))->getParameters()[0]->getType(), "\n";
    function f65_3(namespace\Foo $x) {}
    echo namespace\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f65_3'))->getParameters()[0]->getType(), "\n";
    function f65_4(Attr $x) {}
    echo Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f65_4'))->getParameters()[0]->getType(), "\n";
    function f65_5(base\Attr $x) {}
    echo base\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f65_5'))->getParameters()[0]->getType(), "\n";
}
namespace ORIG {
    use \Orig\Sub;
    use Orig as Z;
    use Orig as Thing;
    function f66_0(namespace\Sub $x) {}
    echo namespace\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f66_0'))->getParameters()[0]->getType(), "\n";
    function f66_1(namespace\PDO $x) {}
    echo namespace\PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f66_1'))->getParameters()[0]->getType(), "\n";
    function f66_2(Sub $x) {}
    echo Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f66_2'))->getParameters()[0]->getType(), "\n";
    function f66_3(sub\pdo $x) {}
    echo sub\pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f66_3'))->getParameters()[0]->getType(), "\n";
}
namespace Orig\Sub {
    use Orig\Attr as Thing;
    use Orig\Tr as Base;
    use Orig\Tr as Foo;
    use \Thing as Orig;
    function f67_0(namespace\THING $x) {}
    echo namespace\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f67_0'))->getParameters()[0]->getType(), "\n";
    function f67_1(Base $x) {}
    echo Base::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f67_1'))->getParameters()[0]->getType(), "\n";
    function f67_2(namespace\Other $x) {}
    echo namespace\Other::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f67_2'))->getParameters()[0]->getType(), "\n";
    function f67_3(foo\THING $x) {}
    echo foo\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f67_3'))->getParameters()[0]->getType(), "\n";
}
namespace Repl {
    use \Orig\Attr;
    use \ORIG\Contract as Thing;
    use Orig\Base as T;
    use function Foo\Thing; use const Foo\Base;
    function f68_0(\PDO $x) {}
    echo \PDO::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f68_0'))->getParameters()[0]->getType(), "\n";
    function f68_1(t\Sub $x) {}
    echo t\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f68_1'))->getParameters()[0]->getType(), "\n";
    function f68_2(namespace\THING $x) {}
    echo namespace\THING::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f68_2'))->getParameters()[0]->getType(), "\n";
    function f68_3(\Foo\Foo $x) {}
    echo \Foo\Foo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f68_3'))->getParameters()[0]->getType(), "\n";
    function f68_4(namespace\Attr $x) {}
    echo namespace\Attr::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f68_4'))->getParameters()[0]->getType(), "\n";
}
namespace x\y {
    use orig\err as Base;
    use Foo\Thing;
    use Orig\Base as B;
    function f69_0(thing\Sub $x) {}
    echo thing\Sub::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f69_0'))->getParameters()[0]->getType(), "\n";
    function f69_1(Contract $x) {}
    echo Contract::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f69_1'))->getParameters()[0]->getType(), "\n";
    function f69_2(namespace\pdo $x) {}
    echo namespace\pdo::class, '|', (new \ReflectionFunction(__NAMESPACE__ . '\\f69_2'))->getParameters()[0]->getType(), "\n";
}
