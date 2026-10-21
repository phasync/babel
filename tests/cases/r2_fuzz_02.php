<?php
// A close tag ends a statement like ';' does: a use import or a namespace declaration closed
// by a close tag (template style) must be registered like one closed by ';'.
namespace Other;
function fopen(...$a) { return 'Other\fopen'; }
namespace App;
?>
<?php use function Other\fopen ?>
<?php use Orig\Thing as T ?>
<?= fopen('x'), "\n" ?>
<?= get_class(new T), "\n" ?>
<?php namespace Orig ?>
<?php echo get_class(new Thing), "\n";
class K { use \Orig\Tr ?><?php }
echo (new K)->who(), ' ', strtoupper('x'), "\n";
