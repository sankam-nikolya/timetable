<script type="text/javascript" src="<?= base_url() ?>js/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/select2.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/select2-bootstrap.css">

<style>
    .table {
        text-align: left;
    }
</style>
<script type="text/javascript">
    function openWindow(group, day, lesson_time)
    {
        var x = 500;
        var y = 600;
        window.open("<?=base_url()?>index.php/admin_shedule/popup_edit/?group="+group+"&day="+day+"&lt="+lesson_time, 'newwindow', config="height=200, width=370, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no, top="+x+", left="+y);
    }
</script>
<div class="container">
    <div class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#s1" data-toggle="tab">Занятия</a></li>
            <li><a href="#s2" data-toggle="tab">События</a></li>
        </ul>
        <br>

        <div class="tab-content">
            <div class="tab-pane active" id="s1">
                <?php foreach ($days as $day): ?>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td rowspan="3" style="vertical-align: middle">Группа</td>
                            <td colspan="<?= count($timing) ?>"
                                style="text-align: center; font-weight: bold;"><?= $day['formated_date'] ?></td>
                        </tr>
                        <tr>
                            <?php foreach ($timing as $item_num): ?>
                                <td><?= $item_num['num'] ?></td>
                            <?php endforeach ?>
                        </tr>
                        <tr>
                            <?php foreach ($timing as $item_timing): ?>
                                <td><?= $item_timing['start_time'] ?> - <?= $item_timing['end_time'] ?></td>
                            <?php endforeach ?>
                        </tr>
                        <?php foreach ($groups as $group): ?>
                            <tr id="bottom">
                                <td><?= $group['name'] ?></td>
                                <?php foreach ($timing as $item_timing): ?>
                                    <td>
                                        <div id="<?=$group['idgroups']?><?=$day['iddays']?><?=$item_timing['idlessons_time']?>">
                                            <?php foreach ($pars as $par):?>
                                                <?php if ($par['iddays'] == $day['iddays'] && $par['idgroups'] == $group['idgroups'] && $par['idlessons_time'] == $item_timing['idlessons_time']):?>
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
                                            <span class="pull-right"><img id="img_repaet" src="<?=base_url()?>css/images/repeat.png"> <img id="img_edit" src="<?=base_url()?>css/images/edit.png"  onclick="openWindow(<?=$group['idgroups']?>, <?=$day['iddays']?>, <?=$item_timing['idlessons_time']?>);"> <img id="img_delete" src="<?=base_url()?>css/images/delete.png"></spam>
                                        </div>
                                    </td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endforeach ?>
            </div>
            <div class="tab-pane" id="s2">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Текст события записывается в расписание по мере того, как вы его набираете. Не нужно нажимать кнопку
                    "Обновить".
                </div>
                <div class="">
                    <?php foreach ($days as $day): ?>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td rowspan="3" style="vertical-align: middle">Группа</td>
                                <td colspan="<?= count($timing) ?>"
                                    style="text-align: center; font-weight: bold;"><?= $day['formated_date'] ?></td>
                            </tr>
                            <tr>
                                <?php foreach ($timing as $item_num): ?>
                                    <td><?= $item_num['num'] ?></td>
                                <?php endforeach ?>
                            </tr>
                            <tr>
                                <?php foreach ($timing as $item_timing): ?>
                                    <td><?= $item_timing['start_time'] ?> - <?= $item_timing['end_time'] ?></td>
                                <?php endforeach ?>
                            </tr>
                            <?php foreach ($groups as $group): ?>
                                <tr>
                                    <td><?= $group['name'] ?></td>
                                    <td colspan="<?= count($timing) ?>">
                                        <div class="input-group" style="width: 100%">
                                            <input type="text" class="form-control"
                                                   onchange="update_event(<?= $day['iddays'] ?>, <?= $group['idgroups'] ?>, $( this ).val())">
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.tabbable -->
</div>
<script type="text/javascript">
    function update_event(id_day, id_group, message) {
        var data = {
            idDay: id_day,
            idGroup: id_group,
            txtEvent: message
        };

        $.ajax({
            url: "<?= base_url() ?>index.php/admin_shedule/update_db_events",
            type: 'POST',
            data: data
        });
    }
</script>