<script type="text/javascript" src="<?= base_url() ?>js/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/select2.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/select2-bootstrap.css">

<style>
    .table {
        text-align: left;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        <?php foreach ($days as $day): ?>
        <?php foreach ($groups as $group): ?>
        $(".<?=$day['iddays']?><?=$group['idgroups']?>").select2({
            width: '130',
            multiple: true,
            data: [
                {text: ''},
                {text: '0'},
                <?php foreach ($subject_for_group as $sg):?>
                <?php if ($sg['id_group'] == $group['idgroups']):?>
                {id: "<?=$sg['id']?>, 0", text: "<?=$sg['name']?>"},
                <?php endif?>
                <?php endforeach?>
                {text: ''},
                {text: '1'},
                <?php foreach ($subject_for_group as $sg):?>
                <?php if ($sg['id_group'] == $group['idgroups']):?>
                {id: "<?=$sg['id']?>, 1", text: "<?=$sg['name']?>"},
                <?php endif?>
                <?php endforeach?>
                {text: ''},
                {text: '2'},
                <?php foreach ($subject_for_group as $sg):?>
                <?php if ($sg['id_group'] == $group['idgroups']):?>
                {id: "<?=$sg['id']?>, 2", text: "<?=$sg['name']?>"},
                <?php endif?>
                <?php endforeach?>
            ]
        });
        <?php endforeach ?>
        <?php endforeach ?>
    });
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
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Расписание обновляется по мере того, как вы его набираете. Не нужно нажимать кнопку
                    "Обновить".
                </div>
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
                                    <td>
                                        <div class="selectpicker <?= $day['iddays'] ?><?= $group['idgroups'] ?>"
                                             multiple name="binding_select[]"
                                             onchange="update_binding(<?= $day['iddays'] ?>, <?= $group['idgroups'] ?>, <?= $item_timing['idlessons_time'] ?>, $( this ).val())">
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

    function update_binding(iddays, idgroups, idlessons_time, idsubjects_type) {
        if (idsubjects_type != null) {
            var t = 0;
            for (var i = 0; i < idsubjects_type.length; ++i) {

                if (idsubjects_type.length == 2) {
                    var idsubjects_type_array = new Array();
                    idsubjects_type_array = idsubjects_type[i].split(',');

                    var data = {
                        iddays: iddays,
                        idgroups: idgroups,
                        idlessons_time: idlessons_time,
                        idsubjects: parseInt(idsubjects_type_array[0]),
                        type: parseInt(idsubjects_type_array[1]),
                        action: 'insert',
                        t: t
                    };
                    ++t;
                    $.ajax({
                        url: "<?= base_url() ?>index.php/admin_shedule/update_db_binding_sub",
                        type: 'POST',
                        data: data
                    });
                }
                else {
                    var idsubjects_type_array = new Array();
                    idsubjects_type_array = idsubjects_type[i].split(',');

                    var data = {
                        iddays: iddays,
                        idgroups: idgroups,
                        idlessons_time: idlessons_time,
                        idsubjects: parseInt(idsubjects_type_array[0]),
                        type: parseInt(idsubjects_type_array[1]),
                        action: 'insert'
                    };
                    $.ajax({
                        url: "<?= base_url() ?>index.php/admin_shedule/update_db_binding",
                        type: 'POST',
                        data: data
                    });
                }
            }
        }
        else {
            var data = {
                iddays: parseInt(iddays),
                idgroups: parseInt(idgroups),
                idlessons_time: parseInt(idlessons_time),
                action: 'delete'
            };
            $.ajax({
                url: "<?= base_url() ?>index.php/admin_shedule/update_db_binding",
                type: 'POST',
                data: data
            });
        }
    }
</script>


