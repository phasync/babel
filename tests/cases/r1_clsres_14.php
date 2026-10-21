<?php
echo (new ReflectionMethod(objectOrMethod: 'Orig\Thing', method: 'who'))->class, "\n";
echo (new ReflectionClass(objectOrClass: 'Orig\Thing'))->name, "\n";
echo (new ReflectionProperty(class: 'Orig\Thing', property: 'p'))->class, "\n";
