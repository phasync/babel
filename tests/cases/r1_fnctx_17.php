<?php
#[fopen, sleep(1)]
function tagged() { return 'tagged'; }
class fopen {}
const sleep = 5;
switch (fopen('x')) {
    case fopen('x'): echo 'case-call', "\n"; break;
    case sleep: echo "no\n";
}
switch (5) { case sleep: echo 'case-const', "\n"; }
$r = [];
for ($i = fopen('a'), $j = 0; $j < 1 && sleep(1); $j++, $r[] = usleep(1)) { $r[] = $i; }
echo implode(',', $r), "\n";
if (fopen('x')): echo "alt-if\n"; elseif (sleep(1)): else: endif;
foreach ([fopen('x')] as $k => $v): echo $v, "\n"; endforeach;
while (strtoupper('x') === 'HOOK:strtoupper'): echo "alt-while\n"; break; endwhile;
echo print(fopen('p')), "\n";
echo @fopen('x'), !fopen('x') ? 'F' : 'T', -(int) !sleep(1), "\n";
function gen() { $a = yield fopen('y'); yield from [sleep(1), usleep(1)]; return strtoupper('r'); }
$g = gen(); foreach ($g as $v) { echo $v, ' '; } echo $g->getReturn(), "\n";
try { throw new Exception(fopen('e')); } catch (Exception $e) { echo $e->getMessage(), "\n"; }
$cl = clone new ArrayObject([fopen('c')]); echo $cl[0], "\n";
echo $cl instanceof ArrayObject ? fopen('t') : sleep(2), "\n";
?>
inline <?= fopen('x') ?> html <?php echo sleep(1) ?>

<?php echo "end\n";
