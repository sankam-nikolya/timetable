<div class="container">

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
            <tr>      
                <?php foreach ($groups as $group):?>
                    <tr>
                        <td class="anouncegroup"><?=$group['name']?></td>
                        <?php foreach ($pars_timing as $item_timing): ?>
                            <?php foreach ($rend as $par):?>
                                <?php if ($par['iddays'] == $id_day_for_now && $par['idgroups'] == $group['idgroups'] && $par['idlessons_time'] == $item_timing['idlessons_time']):?>
                                    <td>para</td>
                                    <?php break;?>
                                <?php elseif ($par['iddays'] == $id_day_for_now && $par['idgroups'] == $group['idgroups']):?>
                                    <td>ne para</td>    
                                    <?php break;?>
                                <?php endif?>
                            <?php endforeach?>
                        <?php endforeach ?>  
                    </tr>    
                <?php endforeach?>
                
            <tr>        
        </tr>
    </table>
</div>