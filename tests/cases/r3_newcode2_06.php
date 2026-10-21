<?php
// Close tags ending use / use function / use const / namespace / const / trait use statements.
namespace App ?>
<?php use Orig\Thing as T, Orig\Base ?>
<?php use function fopen as fo, strtoupper ?>
<?php use const PHP_EOL as NL ?>
<?php const K = T::X, K2 = __FILE__ ?>
<?php class C extends Base { use \Orig\Tr ?><?php
    const Q = T::X ?><?php } ?>
<?php
echo T::who(), (new C)->name(), (new C)->who(), fo("a", "r"), strtoupper("a"), K, C::Q, basename(K2), NL;
$f = fn () => T::class ?>
<?= $f(), NL ?>
<?php echo \Orig\Thing::who() ?>
