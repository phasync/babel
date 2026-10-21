<?php
// Case-insensitive function/class names for the class-name finder; class-name calls nested in each other's args.
namespace cv;
$r = new \Repl\Thing;
var_dump(IS_A($r, 'Orig\Thing'), \Is_A($r, class: 'Orig\Thing'));
echo (new \REFLECTIONCLASS('orig\THING'))->getName(), ' ', (NEW \reflectionClass(objectOrClass: 'Orig\Thing'))->getName(), "\n";
var_dump(Class_Exists(Get_Parent_Class(\Is_Subclass_Of('Orig\Err', 'Exception') ? 'Orig\Err' : 'x')));
echo implode(',', CLASS_IMPLEMENTS(\is_a($r, 'Orig\Thing') ? 'Orig\Err' : 'Orig\Base')), "\n";
