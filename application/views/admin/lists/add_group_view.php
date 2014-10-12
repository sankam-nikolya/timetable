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
    <hr>
    <form method="post" action="<?= base_url() ?>index.php/admin_shedule/add_db_group">
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Название</span>
            <input required type="text" class="form-control" name="name">
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Тип</span>
            <select required class="form-control" name="fulltime">
                <option value="1">Очная</option>
                <option value="0">Заочная</option>
            </select>
        </div>
        <div class="input-group" style="padding-bottom: 20px">
            <span class="input-group-addon">Активность</span>
            <select required class="form-control" name="active">
                <option value="1">Активная</option>
                <option value="0">Неактивная</option>
            </select>
        </div>
        <p><input type="submit" class="btn btn-primary" value="Добавить"></p>
    </form>
</div>