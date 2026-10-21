<?php
declare(strict_types=1);
// In a strict_types file, a class-name function called through a string callable checks its
// arguments strictly: $g(123), 123 |> 'class_exists', call_user_func('class_exists', 123).
$g = 'class_exists';
try { var_dump($g(123)); } catch (TypeError $e) { echo $e->getMessage(), "\n"; }
try { var_dump(123 |> 'class_exists'); } catch (TypeError $e) { echo $e->getMessage(), "\n"; }
try { var_dump(call_user_func('class_exists', 123)); } catch (TypeError $e) { echo $e->getMessage(), "\n"; }
try { var_dump(['is_a'][0]('Orig\Thing', 'Orig\Thing', 1)); } catch (TypeError $e) { echo $e->getMessage(), "\n"; }
var_dump($g('Orig\Thing'));
