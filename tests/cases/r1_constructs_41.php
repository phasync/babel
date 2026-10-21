<?php
function t($code) {
    try { var_dump(eval($code)); } catch (Throwable $e) { echo get_class($e), ': ', $e->getMessage(), ' @', $e->getLine(), "\n"; }
}
t('echo "unterminated ');
t("/* open comment fopen(1)\n\n");
t("echo <<<X\nabc fopen(1)\n");
t('?>inline <?php echo 1 ?> tail');
t("?>\n<?= 5 ?>\nafter");
t('<?php echo 1;');
t('#!/bin/sh');
t('namespace A; echo __NAMESPACE__; namespace B; echo __NAMESPACE__;');
t('declare(strict_types=1); echo strlen("a");');
t('return;');
t('return fopen(1) . "\\\\" . __LINE__;');
t("\n\n\nreturn __LINE__ . sleep(1);");
t('use Orig\Thing; return Thing::who();');
t('goto x; echo 1; x: return "gone";');
t('exit_not_called: return 7;');
t('throw new Exception("from eval " . __LINE__);');
