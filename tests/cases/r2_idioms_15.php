<?php use Orig\Thing; use Orig\Base as B; $items = [new Thing, new B, unserialize('O:10:"Orig\\Thing":0:{}')]; ?>
<ul>
<?php foreach ($items as $i => $item): ?>
  <?php if ($item instanceof Thing): ?><li class="<?= strtoupper('thing') ?>"><?= $item::who() ?></li>
  <?php elseif ($item instanceof B): ?><li><?= $item->name(), ' ', B::class ?></li>
  <?php else: ?><li><?php echo get_class($item) ?></li><?php endif ?>
<?php endforeach; ?>
</ul>
<?php function render(Thing|B $x): string { ob_start(); ?>
<b><?= $x instanceof Thing ? Thing::X : B::class ?></b>
<?php return ob_get_clean(); } ?>
<?= render(new Thing) . render(new B) ?>
<?php switch (true): case $items[0] instanceof Thing: ?>first is thing <?= fopen('x', 'r') ?>
<?php break; endswitch ?>
<?php while (false): endwhile; for ($k = 0; $k < 1; $k++): ?>[<?= Thing::class ?>]<?php endfor ?>

<?php declare(ticks=1); $c = new class extends B { } ?><?= get_parent_class($c) ?>

