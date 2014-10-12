<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-select.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap-select.min.css">

<div class="container">
    <a href="<?= base_url() ?>admin/cabinets" class="btn btn-primary btn-sm">&larr; Вернуться</a>
    <a href="<?= base_url() ?>index.php/admin_shedule/delete_db_cabinet/?id=<?= $info[0]['idcabinets'] ?>"
       class="btn btn-danger btn-sm">Удалить</a>
    <hr>
    <form method="post"
          action="<?= base_url() ?>index.php/admin_shedule/update_db_cabinet/?id=<?= $info[0]['idcabinets'] ?>">
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Название</span>
            <input required type="text" class="form-control" name="name"
                   <?php if (isset($info)): ?>value="<?= $info[0]['name'] ?>"<?php endif ?>
                >
        </div>
        <p><input type="submit" class="btn btn-primary" value="Обновить"></p>
    </form>
</div>