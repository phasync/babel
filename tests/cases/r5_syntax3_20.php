<?php
// __COMPILER_HALT_OFFSET__ in eval'd code with rewrites in front of it, also behind close-tag regions
$code = <<<'C'
echo fopen('x'), ' ', __COMPILER_HALT_OFFSET__, "\n"; ?>
html {
<?php echo strtoupper('('), \__COMPILER_HALT_OFFSET__, "\n";
__halt_compiler(); data ]
C;
eval($code);
echo strpos($code, '__halt_compiler();') + strlen('__halt_compiler();'), "\n";
$code2 = 'namespace N; use const __COMPILER_HALT_OFFSET__ as H; $f = "fopen"; echo $f(), H, "\n"; __halt_compiler() ?>tail';
eval($code2);
echo strpos($code2, '?>') + 2, "\n";
