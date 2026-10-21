<?php
namespace trt;
use Orig\Tr;
use Orig\Tr as Alias;
trait Other { public function who() { return 'Other'; } public function sleepy() { return sleep(1); } }
class A { use Tr, Other { Tr::who insteadof Other; Other::who as otherWho; Alias::who as protected prot; } 
  public function callProt() { return $this->prot(); } }
class B { use Alias { Alias::who as Thing; } }
$a = new A; $b = new B;
echo $a->who(), ' ', $a->otherWho(), ' ', $a->callProt(), ' ', ' ', $a->sleepy(), ' ', $b->who(), ' ', $b->Thing(), "\n";
echo implode(',', array_keys(class_uses($a))), '|', implode(',', array_keys((new \ReflectionClass(A::class))->getTraits())), '|', implode(',', class_uses(B::class)), "\n";
