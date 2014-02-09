1<div class="container">

    <table class="table table-bordered">
        <tr>
            <td rowspan="3" style="vertical-align: middle">Группа</td>
            <td colspan="<?=count($pars_timing)?>" style="text-align: center; font-weight: bold;"><?= $day_for_now ?></td>
        </tr>
        <tr>
            <?php foreach ($pars_timing as $item_num): ?>
                <td><?= $item_num['num'] ?></td>
            <?php endforeach ?>
        </tr>
        <tr>
            <?php foreach ($pars_timing as $item_timing): ?>
                <td><?= $item_timing['start_time'] ?> - <?= $item_timing['end_time'] ?></td>
            <?php endforeach ?>
        </tr>

        <tr class="rowdown">            
            <?php foreach ($groups as $group):?>
                <tr>
                    <td class="anouncegroup"><?=$group['name']?></td>
                    <?php foreach ($pars as $par):?>
                        <?php if ($par['iddays'] === $id_day_for_now && $par['idgroups'] === $group['idgroups']):?>
                            <td>
                                <?php if ($par['type'] == 0):?>
                                    <p><span title="Общая пара. Преподаватель: <?=$par['first_name']?> <?=$par['patronymic']?>"><?=$par['subject']?></span><p>
                                <?php elseif ($par['type'] == 1):?>
                                    <p><span class="wordup" title="Верхняя подгруппа. Преподаватель: <?=$par['first_name']?> <?=$par['patronymic']?>"><?=$par['subject']?></span><p>
                                <?php elseif ($par['type'] == 2):?>
                                    <p><span class="wordbottom" title="Нижняя подгруппа. Преподаватель: <?=$par['first_name']?> <?=$par['patronymic']?>"><?=$par['subject']?></span><p>
                                <?php endif?>  
                            </td>    
                        <?php endif?> 
                    <?php endforeach?>                           
                <tr>
            <?php endforeach?>            
        </tr>
    </table>

</div>