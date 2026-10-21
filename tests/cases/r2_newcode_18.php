<?php
// A double-quoted literal with escape sequences is still the class name it decodes to.
echo (new ReflectionClass("\x4frig\\Thing"))->getName(), "\n";
echo (new ReflectionClass("Orig\u{5c}Thing"))->getName(), "\n";
echo (new ReflectionClass("Orig\134Thing"))->getName(), "\n";
