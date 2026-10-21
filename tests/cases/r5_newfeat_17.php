<?php
// Enum cases and methods named like keywords and mapped functions, in a namespace made of keywords.
namespace Match\Enum\Fn;
enum E: string {
    case Default = 'strtoupper'; case Static = 'Orig\Thing'; case New = 'n'; case Function = 'f'; case List = 'l';
    case fopen = 'fo'; case Match = 'm'; case Readonly = 'r'; case Enum = 'e'; case Array = 'a'; case Fn = 'fn';
    case Exit = 'x'; case Die = 'd'; case Eval = 'ev'; case Isset = 'i'; case Print = 'p'; case Include = 'inc'; case Clone = 'c';
    const Class_ = 1;
    public static function fopen() { return 'E::fopen'; }
    public static function eval() { return 'E::eval'; }
    public static function new() { return 'E::new'; }
}
echo (E::Default->value)('a'), "\n";
echo E::Static->value::who(), "\n";
echo E::fopen->value, ' ', E::fopen(), ' ', E::eval(), ' ', E::new(), "\n";
echo E::Exit->value, E::Die->value, E::Eval->value, E::Isset->value, E::Print->value, E::Include->value, E::Clone->value, "\n";
echo E::Match->name, E::List->name, E::Fn->name, E::Array->name, E::New->name, E::Function->name, "\n";
echo fopen('x'), "\n";
echo \Match\Enum\Fn\E::Default->value |> 'strrev', "\n";
echo (E::from('strtoupper')->value)('b'), (E::tryFrom('Orig\\Thing')?->value)::who(), "\n";
