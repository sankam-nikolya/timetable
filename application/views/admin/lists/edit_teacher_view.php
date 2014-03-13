<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-select.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap-select.min.css">

<div class="container">
    <a href="<?= base_url() ?>admin/teachers" class="btn btn-primary btn-sm">&larr; Вернуться</a>
    <a href="<?= base_url() ?>index.php/admin_shedule/delete_db_teacher/?id=<?= $info[0]['idteacher'] ?>"
       class="btn btn-danger btn-sm">Удалить</a>
    <hr>
    <form method="post"
          action="<?= base_url() ?>index.php/admin_shedule/update_db_teacher/?id=<?= $info[0]['idteacher'] ?>">
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Фамилия</span>
            <input required type="text" class="form-control" name="last_name"
                   <?php if (isset($info)): ?>value="<?= $info[0]['last_name'] ?>"<?php endif ?>
                >
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Имя</span>
            <input required type="text" class="form-control" name="first_name"
                   <?php if (isset($info)): ?>value="<?= $info[0]['first_name'] ?>"<?php endif ?>
                >
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Отчество</span>
            <input required type="text" class="form-control" name="patronymic"
                   <?php if (isset($info)): ?>value="<?= $info[0]['patronymic'] ?>"<?php endif ?>
                >
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Видимость</span>
            <select required class="form-control selectpicker" name="visibility">
                <option value="1" <?php if (isset($info) && $info[0]['visibility'] == 1): ?>selected<?php endif ?>>
                    Видимый
                </option>
                <option value="0" <?php if (isset($info) && $info[0]['visibility'] == 0): ?>selected<?php endif ?>>Не
                    видимый
                </option>
            </select>
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Предметы</span>
            <select class="form-control selectpicker" multiple data-live-search="true" name="subjects[]">
                <?php foreach ($subjects as $subject): ?>
                    <option
                        <?php foreach ($bindingTeacherSubject as $bts): ?>
                            <?php if ($subject['idsubects'] == $bts['idSubject']): ?>
                                selected
                            <?php endif ?>
                        <?php endforeach ?>
                        value="<?= $subject['idsubects'] ?>"><?= $subject['full_name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <p><input type="submit" class="btn btn-primary" value="Обновить"></p>
    </form>
</div>