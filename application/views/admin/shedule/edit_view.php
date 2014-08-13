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
        var win = window.open("<?=base_url()?>index.php/admin_shedule/popup_edit/?group="+group+"&day="+day+"&lt="+lesson_time, 'newwindow', config="height=140, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no, top="+x+", left="+y);
        win.onunload = function() { win.RunCallbackFunction = refresh_td(day, group, lesson_time); };
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
                                <td><p><?= $item_timing['start_time'] ?> - <?= $item_timing['end_time'] ?></p></td>
                            <?php endforeach ?>
                        </tr>
                        <?php foreach ($groups as $group): ?>
                            <tr id="bottom">
                                <td><?= $group['name'] ?></td>
                                <?php foreach ($timing as $item_timing): ?>
                                    <td id="edit_td">
                                        <div id="<?=$day['iddays']?><?=$group['idgroups']?><?=$item_timing['idlessons_time']?>">
                                            <?php foreach ($pars as $par):?>
                                                <?php if ($par['iddays'] == $day['iddays'] && $par['idgroups'] == $group['idgroups'] && $par['idlessons_time'] == $item_timing['idlessons_time']):?>
                                                    <?php if ($par['type'] == 0):?>
                                                        <p><?=$par['subject']?> <span class="clr"><?=$par['cabinet']?></span></p>
                                                    <?php endif?>    
                                                    <?php if ($par['type'] == 1):?>
                                                        <p><span class="wordup"><?=$par['subject']?></span> <span class="clr"><?=$par['cabinet']?></span></p>
                                                    <?php endif?>   
                                                    <?php if ($par['type'] == 2):?>
                                                        <p><span class="wordbottom"><?=$par['subject']?></span> <span class="clr"><?=$par['cabinet']?></span></p>
                                                    <?php endif?>   
                                                <?php endif?>    
                                            <?php endforeach?>
                                        </div>
                                        <span class="pull-right"><img id="img_repeat" src="<?=base_url()?>css/images/repeat.png" onclick="refresh_td(<?=$day['iddays']?>, <?=$group['idgroups']?>, <?=$item_timing['idlessons_time']?>)"> <img id="img_edit" src="<?=base_url()?>css/images/edit.png"  onclick="openWindow(<?=$group['idgroups']?>, <?=$day['iddays']?>, <?=$item_timing['idlessons_time']?>);"> <img id="img_delete" src="<?=base_url()?>css/images/delete.png" onclick="delete_binding(<?=$day['iddays']?>, <?=$group['idgroups']?>, <?=$item_timing['idlessons_time']?>)"></span>
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
                                            <input  type="text" class="form-control"
                                                    onchange="update_event(<?= $day['iddays'] ?>, <?= $group['idgroups'] ?>, $( this ).val())"
                                                    <?php foreach ($events as $event):?>
                                                        <?php if ($event['idDay'] == $day['iddays'] && $event['idGroup'] == $group['idgroups']):?>
                                                           value="<?=$event['txtEvent']?>" 
                                                        <?php endif?>
                                                    <?php endforeach ?>
                                                    
                                                   >
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

    function delete_binding(iddays, idgroups, idlessons_time)
    {
        if (confirm("Вы уверены, что хотите удалить?")) 
        {
            var data = {
                iddays: iddays,
                idgroups: idgroups,
                idlessons_time: idlessons_time
            };

            $.ajax({
                url: "<?= base_url() ?>index.php/admin_shedule/delete_binding",
                type: 'POST',
                data: data,
                success: function() {
                    refresh_td(iddays, idgroups, idlessons_time);
                }
            });
        }        
    }

    function refresh_td(iddays, idgroups, idlessons_time)
    {
        var data = {
            iddays: iddays,
            idgroups: idgroups,
            idlessons_time: idlessons_time
        };

        $.ajax({
            url: "<?= base_url() ?>index.php/admin_shedule/get_short_binding",
            type: 'POST',
            data: data,
            success: function(msg) {
                console.log(msg);   
                $("#"+iddays+idgroups+idlessons_time).empty();
                for (var i = 0; i < msg.length; i++) {
                    switch (msg[i]['type'])
                    {
                        case '0': 
                            $("#"+iddays+idgroups+idlessons_time).append(msg[i]['name']);
                            if (msg[i]['cab'] != null)
                                $("#"+iddays+idgroups+idlessons_time).append(" <span class='clr'>" + msg[i]['cab'] + "</span>");
                        break;
                        case '1': 
                            $("#"+iddays+idgroups+idlessons_time).append( "<span class='wordup'>" + msg[i]['name']);
                            if (msg[i]['cab'] != null)
                                $("#"+iddays+idgroups+idlessons_time).append(" <span class='clr'>" + msg[i]['cab'] + "</span>");
                            $("#"+iddays+idgroups+idlessons_time).append("<br>");

                        break;
                        case '2': 
                            $("#"+iddays+idgroups+idlessons_time).append( "<span class='wordbottom'>" + msg[i]['name']);
                            if (msg[i]['cab'] != null)
                                $("#"+iddays+idgroups+idlessons_time).append(" <span class='clr'>" + msg[i]['cab'] + "</span>");

                        break;

                    }
                };                
            }
        });
    }
</script>