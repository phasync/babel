<?php
namespace a;
// f()::member / A::b()::member - a call result used as class (joomla `Factory::getApplication()::getRouter()`,
// laravel `get_class($this->resource)::$wrap`), and A::CONST::member (moodle `generate_text::class::get_basename()`)
function cls() { return 'Orig\Thing'; }
class F { const C = 'Orig\Thing'; public static function c() { return 'Orig\Thing'; } }
echo cls()::who(), "\n";
echo F::c()::X, "\n";
echo F::c()::$p, "\n";
echo F::C::who(), "\n";
