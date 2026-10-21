<?php
namespace app;
// Translated code eval'd again: eval('?' . '>' . $translatedFile) and translated eval code; nothing may be
// applied twice and the code behaves as the translation did.
$b = \phasync\Babel\Runtime::babel();
function sleep($x) { return 'app\sleep'; }
$file = <<<'SRC'
<?php
namespace app;
use function strtoupper as up;
$c = 'Orig\Thing';
$o = null;
echo fopen('a'), '|', sleep(1), '|', up('b'), '|', $c::who(), '|', var_export($o?->p::who(), true), '|', "{$c::who()}", '|', is_a(new $c, 'Orig\Thing'), '|', array_map('strtoupper', ['x']), "\n";
echo <<<H
{$c::who()} {$c::who()}

H;
$f = fn($x) => $x::who();
echo $f($c), '|', \call_user_func([$c, 'who']), '|', eval('return fopen("q");'), "\n";
SRC;
$t = $b->translate($file, '/virtual/app.php');
eval('?>' . $t);
$e = $b->translate(substr($file, 6), __FILE__ . '(20) : eval()\'d code');
eval($e);
eval(str_replace($b->marker, '', $e));
echo $b->translate('?>' . $t, 'x(1) : eval()\'d code') === '?>' . $t ? 'same' : 'CHANGED', "\n";
