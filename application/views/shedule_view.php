<script type="text/javascript"> function time() {return parseInt(new Date().getTime() / 1000) } function show_button_<?=$day_for_now['unix_time']?>() {$('#buttons-<?=$day_for_now['unix_time']?>').show(600) } function click_edit_button(day) {window.location.href = "<?=base_url()?>index.php/admin_shedule/edit_shedule_view?from=" + day + "&to=" + day + ""; } function click_delete_button(id) {if (confirm("Вы уверены, что хотите удалить?")) {var data = {id: id }; $.ajax({url: "<?= base_url() ?>index.php/admin_shedule/delete_db_day", type: 'POST', data: data }); window.setTimeout(relaod, 1000); function relaod() {location.reload(); } } } </script>
<div class="container">
    <table class="table table-bordered" <?php if ($this->ion_auth->is_admin()): ?>onmouseover="show_button_<?= $day_for_now['unix_time'] ?>()"<?php endif ?> <?php if ($day_for_now['date'] < date('Y-m-d')): ?> style="opacity: 0.5;"<?php endif ?> <?php if ($day_for_now['date'] == date('Y-m-d')):?>style="box-shadow: 0 0 8px #d98635; -moz-box-shadow: 0 0 8px #d98635;"<?php endif?>>
        <tr>
            <td rowspan="3" style="vertical-align: middle">Группа</td>
            <td colspan="<?=count($pars_timing)?>" style="text-align: center; font-weight: bold;"><?= $day_for_now['formated_date'] ?>
                <?php if ($this->ion_auth->is_admin()): ?>
                    <div id="buttons-<?= $day_for_now['unix_time'] ?>" class="pull-right" style="display: none">
                        <button id="button_edit" class="btn btn-primary btn-xs"
                                onclick="click_edit_button('<?= $day_for_now['date'] ?>')">Редактировать
                        </button>
                        &nbsp;
                        <button id="button_delete" class="btn btn-danger btn-xs"
                                onclick="click_delete_button('<?= $day_for_now['iddays'] ?>')">Удалить
                        </button>
                    </div>
                <?php endif ?>
            </td>
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
        <?php foreach ($groups as $group):?>
            <tr class="rowdown">
                <?php $flag = false;?>
                    <td class="anouncegroup"><?=$group['name']?></td>
                    <?php foreach ($event as $even):?>
                        <?php if ($even['idGroup'] == $group['idgroups']):?>
                            <td class="cell" colspan="<?=count($pars_timing)?>"><?=$even['txtEvent']?></td>
                        <?php $flag = true;?>
                    <?php endif?>
                    <?php endforeach?>
                    <?php if (!$flag):?>
                        <?php foreach ($pars_timing as $item_timing): ?>
                            <td class="cell">
                                <?php foreach ($pars as $par):?>
                                    <?php if ($par['idgroups'] == $group['idgroups'] && $par['idlessons_time'] == $item_timing['idlessons_time']):?>
                                        <?php if ($par['type'] == 0):?>
                                            <p><span title="Общая пара. Преподаватель: <?=$par['first_name']?> <?=$par['patronymic']?>"><?=$par['subject']?> <span class="clr"><?=$par['cabinet']?></span></span></p>
                                        <?php endif?>    
                                        <?php if ($par['type'] == 1):?>
                                            <p><span class="wordup" title="Верхняя подгруппа. Преподаватель: <?=$par['first_name']?> <?=$par['patronymic']?>"><?=$par['subject']?> <span class="clr"><?=$par['cabinet']?></span></span></p>
                                        <?php endif?>   
                                        <?php if ($par['type'] == 2):?>
                                            <p><span class="wordbottom" title="Нижняя подгруппа. Преподаватель: <?=$par['first_name']?> <?=$par['patronymic']?>"><?=$par['subject']?> <span class="clr"><?=$par['cabinet']?></span></span></p>
                                        <?php endif?>   
                                    <?php endif?>    
                                <?php endforeach?>
                            </td>
                    <?php endforeach ?>
                <?php endif?>
            <tr>    
        <?php endforeach?>
    </table>
</div>