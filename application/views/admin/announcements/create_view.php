<div class="container">
    <div class="form-horizontal" role="form">
        <div class="form-group">
            <label for="inputHeader" class="col-sm-2 control-label">Заголовок</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputHeader">
            </div>
        </div>
        <div class="form-group">
            <label for="inputText" class="col-sm-2 control-label">Текст</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="inputText" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button id="buttonAdd" class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </div>        
</div>
<script type="text/javascript">
    $('#buttonAdd').click(function(event) {
        var data = {
            title: $('#inputHeader').val(),
            text:  $('#inputText').val()
        };

        $.ajax({
            url: "<?= base_url() ?>admin/announcements/add_db",
            type: 'POST',
            data: data
        });
    });
</script>