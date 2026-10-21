html <?=fopen("a")?> more <?php echo __LINE__, strtoupper("b"), "\n";
?>
<?php
declare(ticks=1);
echo __LINE__, fopen("c"), "\n";
