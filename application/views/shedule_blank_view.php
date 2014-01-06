<?php if ($this->ion_auth->is_admin()): ?>
    <script type="text/javascript">

        function time() {
            return parseInt(new Date().getTime() / 1000)
        }

        function check_actuality(ut) {
            alert(ut);
            alert(time());
            if (time() > ut) {

            }
        }

        function show_button_<?=$day_for_now['unix_time']?>() {
            $('#buttons-<?=$day_for_now['unix_time']?>').show(600)
        }
        function click_edit_button(day) {
            window.location.href = "<?=base_url()?>index.php/admin_shedule/edit_shedule_view?from=" + day + "&to=" + day + "";
        }
        function click_delete_button(id) {

            if (confirm("Вы уверены, что хотите удалить?")) {
                var data = {
                    id: id
                };

                $.ajax({
                    url: "<?= base_url() ?>index.php/admin_shedule/delete_db_day",
                    type: 'POST',
                    data: data
                });

                window.setTimeout(relaod, 1000);
                function relaod()
                {
                    location.reload();
                }
            }
        }
    </script>
<?php endif ?>

<div class="container"
    <?php if ($day_for_now['unix_time'] < time()): ?>
        style="opacity: 0.5"
    <?php endif ?>
    >
    <table class="table table-bordered" onmouseover="show_button_<?= $day_for_now['unix_time'] ?>()">
        <tr>
            <td rowspan="3" style="vertical-align: middle">Группа</td>
            <td colspan="<?= count($pars_timing) + 1 ?>"
                style="text-align: center; font-weight: bold;"><?= $day_for_now['formated_date'] ?>
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