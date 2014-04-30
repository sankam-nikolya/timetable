<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/jquery.datetimepicker.css"/ >
<script src="<?=base_url()?>js/jquery.datetimepicker.js"></script>
<div class="container">
    <div id="formAlert" class="alert alert-success hide">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Well done!</strong> You successfully add this ad.
    </div>
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
            <label for="inputDateTimeStart" class="col-sm-2 control-label">Время начала</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputDateTimeStart">
            </div>
            <label for="inputDateTimeEnd" class="col-sm-2 control-label">Время окончания</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputDateTimeEnd">
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
            text:  $('#inputText').val(),
            start_datestamp:  $('#inputDateTimeStart').val(),
            end_datestamp:  $('#inputDateTimeEnd').val()
        };

        $.ajax({
            url: "<?= base_url() ?>admin/announcements/add_db",
            type: 'POST',
            data: data,
            success: function() {
                $("#formAlert").removeClass("hide");
            }
        });
    });

    jQuery(function(){
     jQuery('#inputDateTimeStart').datetimepicker({
       lang:'ru',
      format:'Y-m-d H:i',
      onShow:function( ct ){
       this.setOptions({
        //maxDate:jQuery('#inputDateTimeEnd').val()?jQuery('#inputDateTimeEnd').val():false
       })
      },
      timepicker:true,
      mask:true
     });
     jQuery('#inputDateTimeEnd').datetimepicker({
       lang:'ru',
      format:'Y-m-d H:i',
      onShow:function( ct ){
       this.setOptions({
        minDate:jQuery('#inputDateTimeStart').val()?jQuery('#inputDateTimeStart').val():false
       })
      },
      timepicker:true,
      mask:true
     });
    });
</script>