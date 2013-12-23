<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-select.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap-select.min.css">

<style>
    .table {
        text-align: left;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
            $('.selectpicker').selectpicker('mobile');
        }
        else
            $('.selectpicker').selectpicker({
                width: '80'
            })
    });
    function hide_selectors(id_tr) {
        if ($('#input_event').val().length > 0)
        {
            $('.' + id_tr).prop('disabled', true);
            $('.' + id_tr).selectpicker('refresh');
        }
        else
        {
            $('.' + id_tr).prop('disabled', false);
            $('.' + id_tr).selectpicker('refresh');
        }
    }
</script>
<div class="container">
    <form action="<?= base_url() ?>index.php/admin_shedule/update_db_binding" method="post">
        <?php foreach ($days as $day): ?>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td rowspan="3" style="vertical-align: middle">Группа</td>
                    <td colspan="8" style="text-align: center; font-weight: bold;"><?= $day['formated_date'] ?></td>
                </tr>
                <tr>
                    <?php foreach ($timing as $item_num): ?>
                        <td><?= $item_num['num'] ?></td>
                    <?php endforeach ?>
                    <td style="vertical-align: middle" rowspan="2">Событие</td>
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
                                <select class="selectpicker <?= $day['iddays'] ?><?= $group['idgroups'] ?>" multiple name="binding_select[]"
                                        id="<?= $day['iddays'] ?><?= $group['idgroups'] ?>">
                                    <optgroup label="Общие пары">
                                        <?php foreach ($bindingSubjectGroup as $item): ?>
                                            <?php foreach ($item as $item1): ?>
                                                <?php if ($item1['idgroups'] == $group['idgroups']): ?>
                                                    <option
                                                        <?php foreach ($bindings as $binding): ?>
                                                            <?php if ($day['iddays'] == $binding['iddays'] && $group['idgroups'] == $binding['idgroups'] && $item_timing['idlessons_time'] == $binding['idlessons_time'] && $item1['idsubjects'] == $binding['idsubjects'] && 0 == $binding['type']): ?>
                                                                selected
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                        value="<?= $day['iddays'] ?>:<?= $group['idgroups'] ?>:<?= $item_timing['idlessons_time'] ?>:0:<?= $item1['idsubjects'] ?>"
                                                        data-subtext="<?= $item1['teacher_fname'] ?> <?= $item1['teacher_patronymic'] ?> "><?= $item1['subject'] ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endforeach ?>
                                    </optgroup>
                                    <optgroup label="1 подгруппа">
                                        <?php foreach ($bindingSubjectGroup as $item): ?>
                                            <?php foreach ($item as $item1): ?>
                                                <?php if ($item1['idgroups'] == $group['idgroups']): ?>
                                                    <option
                                                        <?php foreach ($bindings as $binding): ?>
                                                            <?php if ($day['iddays'] == $binding['iddays'] && $group['idgroups'] == $binding['idgroups'] && $item_timing['idlessons_time'] == $binding['idlessons_time'] && $item1['idsubjects'] == $binding['idsubjects'] && 1 == $binding['type']): ?>
                                                                selected
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                        value="<?= $day['iddays'] ?>:<?= $group['idgroups'] ?>:<?= $item_timing['idlessons_time'] ?>:1:<?= $item1['idsubjects'] ?>"
                                                        data-subtext="<?= $item1['teacher_fname'] ?> <?= $item1['teacher_patronymic'] ?> "><?= $item1['subject'] ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endforeach ?>
                                    </optgroup>
                                    <optgroup label="2 подгруппа">
                                        <?php foreach ($bindingSubjectGroup as $item): ?>
                                            <?php foreach ($item as $item1): ?>
                                                <?php if ($item1['idgroups'] == $group['idgroups']): ?>
                                                    <option
                                                        <?php foreach ($bindings as $binding): ?>
                                                            <?php if ($day['iddays'] == $binding['iddays'] && $group['idgroups'] == $binding['idgroups'] && $item_timing['idlessons_time'] == $binding['idlessons_time'] && $item1['idsubjects'] == $binding['idsubjects'] && 2 == $binding['type']): ?>
                                                                selected
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                        value="<?= $day['iddays'] ?>:<?= $group['idgroups'] ?>:<?= $item_timing['idlessons_time'] ?>:2:<?= $item1['idsubjects'] ?>"
                                                        data-subtext="<?= $item1['teacher_fname'] ?> <?= $item1['teacher_patronymic'] ?> "><?= $item1['subject'] ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endforeach ?>
                                    </optgroup>
                                </select>
                            </td>
                        <?php endforeach ?>
                        <td>
                            <input id="input_event" type="text" name="event:<?= $day['iddays'] ?>:<?= $group['idgroups']?>">
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        <?php endforeach ?>

        <p><input type="submit" value="Обновить" class="btn btn-default"></p>
    </form>
</div>