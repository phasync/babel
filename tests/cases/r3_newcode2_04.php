<?php
// switch 'case' with __FILE__/include/eval inside enum methods, versus enum cases named by keywords.
namespace App;
enum E: string {
    case include = 'i';
    case eval = 'e';
    case __FILE__ = 'f';
    case new = 'n';
    const fn = self::include, class_ = __DIR__;
    const string function = __FILE__;
    public function t(string $p) {
        switch ($p) {
            case __FILE__: return 'file';
            case __DIR__ . '/x': return 'dirx';
            case include __DIR__ . '/fixtures/r3_newcode2_ret.php': return 'inc';
            case eval('return "ev";'): return 'eval';
            case self::eval->value: return 'case-e';
            case \Orig\Thing::X: return 'thing';
        }
        return match ($p) { __DIR__ => 'mdir', default => 'none' };
    }
}
echo E::include->t(__FILE__), E::eval->t(__DIR__ . '/x'), E::new->t('RET'), E::new->t('ev'), "\n";
echo E::new->t('e'), E::new->t('repl'), E::new->t(__DIR__), E::new->t('zz'), "\n";
echo E::fn->value, ' ', E::__FILE__->name, ' ', basename(E::function), ' ', E::class_ === __DIR__ ? 'y' : 'n', "\n";
echo \count(E::cases()), "\n";
