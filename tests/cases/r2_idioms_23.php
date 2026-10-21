<?php
namespace Mockery;

use Orig\Thing;

// Mock generators build class code and eval it; template engines eval compiled templates.
function mock(string $parent, array $methods): object
{
    $name = 'Mock_' . str_replace('\\', '_', $parent) . '_' . count(get_declared_classes());
    $body = '';
    foreach ($methods as $m => $ret) {
        $body .= "    public static function $m() { return " . var_export($ret, true) . " . '/' . parent::$m(); }\n";
    }
    $code = <<<PHP
    namespace Mockery\\Generated;
    final class $name extends \\$parent implements \\Orig\\Contract
    {
    $body}
    return new $name;
    PHP;
    return eval($code);
}

$m = mock('Orig\Thing', ['who' => 'mocked']);
echo get_parent_class($m), ' ', $m::who(), ' ', $m instanceof \Orig\Contract ? 'contract' : 'no', "\n";
$m2 = mock(Thing::class, []);
echo get_parent_class($m2), "\n";

$tpl = '<p><?= strtoupper($name) ?> <?php if ($obj instanceof \Orig\Thing): ?>thing<?php endif; ?></p>' . "\n";
$name = 'x';
$obj = new Thing;
eval('?>' . $tpl);
$compiled = "?>\n<?php use Orig\\Base; ?>\n<i><?= (new Base)->name() ?></i>\n";
eval($compiled);
echo "\n";
