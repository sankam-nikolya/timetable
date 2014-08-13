<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/jquery.datetimepicker.css"/ >
<script src="<?=base_url()?>js/jquery.datetimepicker.js"></script>
<script src="https://datejs.googlecode.com/files/date.js"></script>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
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
            <label for="inputText" class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
              <input type="checkbox" id="checkAllTime"> Без ограничений по времени
            </div>
        </div>
        <div class="form-group" id="formTime">
            <label for="inputDateTimeStart" class="col-sm-2 control-label">Время начала показа объявления</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputDateTimeStart">
            </div>
            <label for="inputDateTimeEnd" class="col-sm-2 control-label">Время окончания показа объявления</label>
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
    tinymce.init({
      selector: "textarea"
    });

    $('#checkAllTime').change(function() {
        if($(this).is(":checked")) {
            $('#formTime').hide();
        }
        else {
            $('#formTime').show();
        }  
    });

    $('#buttonAdd').click(function(event) {
        var ts = Math.round((new Date()).getTime() / 1000);

        if($('#checkAllTime').is(":checked")) {
          var data = {
            title: $('#inputHeader').val(),
            text:  tinymce.get('inputText').getContent(),
            start_datestamp:  ts,
            end_datestamp:  ts,
            created_datestamp: ts,
            ip_address: "<?= $_SERVER['REMOTE_ADDR'] ?>",
            allTime: 1
          }
        }
        else {
          var data = {
            title: $('#inputHeader').val(),
            text:  tinymce.get('inputText').getContent(),
            start_datestamp:  Date.parse($('#inputDateTimeStart').val()).getTime()/1000,
            end_datestamp:  Date.parse($('#inputDateTimeEnd').val()).getTime()/1000,
            created_datestamp: ts,
            ip_address: "<?= $_SERVER['REMOTE_ADDR'] ?>",
            allTime: 0
          };
        }  

        

        $.ajax({
            url: "<?= base_url() ?>admin/announcements/add_db",
            type: 'POST',
            data: data,
            success: function() {
                $("#formAlert").removeClass("hide");
            },
            error: function (argument) {
              console.log(argument);
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
        //minDate:jQuery('#inputDateTimeStart').val()?jQuery('#inputDateTimeStart').val():false
       })
      },
      timepicker:true,
      mask:true
     });
    });
</script>