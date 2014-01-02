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
        $('.selectpicker').select2({
            width: '120',
            maximumSelectionSize: 3
        })
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
                <div class="">
                    <form action="<?= base_url() ?>index.php/admin_shedule/update_db_binding" method="post">
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
                                        <?php foreach ($timing as $item_timing): ?>
                                            <td>
                                                <select class="selectpicker" multiple name="binding_select[]">
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
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php endforeach ?>

                        <p><input type="submit" value="Обновить" class="btn btn-default"></p>
                    </form>
                </div>
            </div>
            <div class="tab-pane" id="s2">
                <div class="">
                    <form action="<?= base_url() ?>index.php/admin_shedule/update_db_events" method="post">
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
                                                       name="event[][[day]<?= $day['iddays'] ?>[group][]<?= $group['idgroups'] ?>[text]]">
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php endforeach ?>

                        <p><input type="submit" value="Обновить" class="btn btn-default"></p>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.tabbable -->
</div>


