<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-select.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap-select.min.css">
<script type="text/javascript">
    $(document).ready(function () {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
            $('.selectpicker').selectpicker('mobile');
        }
        else
            $('.selectpicker').selectpicker()
    })
</script>

<div class="container">
    <a href="<?= base_url() ?>admin/subjects" class="btn btn-primary btn-sm">&larr; Вернуться</a>
    <a href="<?= base_url() ?>index.php/admin_shedule/delete_db_subject/?id=<?= $info[0]['idsubects'] ?>"
       class="btn btn-danger btn-sm">Удалить</a>
    <hr>
    <form method="post"
          action="<?= base_url() ?>index.php/admin_shedule/update_db_subject/?id=<?= $info[0]['idsubects'] ?>">
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Полное название</span>
            <input required type="text" class="form-control" name="full_name"
                   <?php if (isset($info)): ?>value="<?= $info[0]['full_name'] ?>"<?php endif ?>
                >
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Краткое название</span>
            <input required type="text" class="form-control" name="name"
                   <?php if (isset($info)): ?>value="<?= $info[0]['name'] ?>"<?php endif ?>
                >
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Активность</span>
            <select required class="form-control selectpicker" name="active">
                <option value="1" <?php if (isset($info) && $info[0]['active'] == 1): ?>selected<?php endif ?>>
                    Активный
                </option>
                <option value="0" <?php if (isset($info) && $info[0]['active'] == 0): ?>selected<?php endif ?>>Не
                    активный
                </option>
            </select>
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Группы</span>
            <select class="form-control selectpicker" multiple name="groups[]">
                <?php foreach ($groups as $group): ?>
                    <option
                        <?php foreach ($BindingSubjectGroup as $bsg): ?>
                            <?php if ($group['idgroups'] == $bsg['idGroup']): ?>
                                selected
                            <?php endif ?>
                        <?php endforeach ?>
                        value="<?= $group['idgroups'] ?>"><?= $group['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <p><input type="submit" class="btn btn-primary" value="Обновить"></p>
    </form>
</div>