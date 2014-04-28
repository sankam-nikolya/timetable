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
                <button id="buttonUpdate" class="btn btn-primary">Обновить</button>
            </div>
        </div>
    </div>        
</div>
<script type="text/javascript">
    $(document).ready(function(event) {
    	$.getJSON('<?= base_url() ?>admin/announcements/edit_data_json/<?=$this->uri->segment(4)?>', { get_param: 'value' }, function(data) {
    		$('#inputHeader').val(data[0]['title']);
    		$('#inputText').val(data[0]['text']);
		});
    });

    $('#buttonUpdate').click(function(event) {
        var data = {
            title: $('#inputHeader').val(),
            text:  $('#inputText').val()
        };

        $.ajax({
            url: "<?= base_url() ?>admin/announcements/update_db/<?=$this->uri->segment(4)?>",
            type: 'POST',
            data: data
        });
    });
</script>