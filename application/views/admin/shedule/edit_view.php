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
        window.open("<?=base_url()?>index.php/admin_shedule/popup_edit/?group="+group+"&day="+day+"&lt="+lesson_time, 'newwindow', config='height=200, width=370, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
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
                    <input type="hidden" value="<?= $day['iddays'] ?>" name="day">
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
                                <?php foreach ($timing as $item_timing): ?>
                                    <td onclick="openWindow(<?=$group['idgroups']?>, <?=$day['iddays']?>, <?=$item_timing['idlessons_time']?>);">
                                        
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