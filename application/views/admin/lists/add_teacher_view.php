<script type="text/javascript" src="<?=base_url()?>js/bootstrap-select.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrap-select.min.css">
<script type="text/javascript">
    $(document).ready(function() {
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('.selectpicker').selectpicker('mobile');
        }
        else
            $('.selectpicker').selectpicker()
    })
</script>

<div class="container">
    <a href="<?=base_url()?>admin/teachers" class="btn btn-primary btn-sm">&larr; Вернуться</a>
    <hr>
    <form method="post" action="<?=base_url()?>index.php/admin_shedule/add_db_teacher">
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Фамилия</span>
            <input required type="text" class="form-control" name="last_name">
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Имя</span>
            <input required type="text" class="form-control" name="first_name">
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Отчество</span>
            <input required type="text" class="form-control" name="patronymic">
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Видимость</span>
            <select required class="form-control selectpicker" name="visibility">
                <option value="1" <?php if (isset($info) && $info[0]['visibility'] == 1):?>selected<?php endif?>>Видимый</option>
                <option value="0" <?php if (isset($info) && $info[0]['visibility'] == 0):?>selected<?php endif?>>Не видимый</option>
            </select>
        </div>
        <p><input type="submit" class="btn btn-primary" value="Добавить"></p>
    </form>
</div>