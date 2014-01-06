<tr class="rowdown">
    <td class="anouncegroup"><?= $group_for_now ?></td>
    <?php if (count($event) > 0): ?>
        <?= $pars_rendered[0] ?>
    <?php else: ?>
        <?php foreach ($pars_rendered as $item): ?>
            <?= $item ?>
        <?php endforeach ?>
    <?php endif ?>
</tr>