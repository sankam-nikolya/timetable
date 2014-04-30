<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/jquery.datetimepicker.css"/ >
<script src="<?=base_url()?>js/jquery.datetimepicker.js"></script>
<script src="https://datejs.googlecode.com/files/date.js"></script>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<div class="container">

  <div id="formAlert" class="alert alert-success hide">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Well done!</strong> You successfully update this ad.
  </div>
   <div id="formAlert1" class="alert alert-success hide">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Well done!</strong> You successfully delete this ad.
  </div>
  <a href="<?= base_url() ?>admin/announcements" class="btn btn-primary btn-sm">&larr; Вернуться</a>
    <button class="btn btn-danger btn-sm pull-right" id="buttonDelete">Удалить</button>
    <hr>
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
            <label for="inputDateTimeStart" class="col-sm-2 control-label">Время начала</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputDateTimeStart">
            </div>
            <label for="inputDateTimeEnd" class="col-sm-2 control-label">Время окончания</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputDateTimeEnd">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button id="buttonUpdate" class="btn btn-primary">Обновить</button>
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

    $.getJSON('<?= base_url() ?>admin/announcements/edit_data_json/<?=$this->uri->segment(4)?>', { get_param: 'value' }, function(data) {
        $('#inputHeader').val(data[0]['title']);
        tinyMCE.get('inputText').setContent(data[0]['text']);
        $('#inputDateTimeStart').val(data[0]['start_datestamp']);
        $('#inputDateTimeEnd').val(data[0]['end_datestamp']);
        if (data[0]['allTime'] == "1")
        {
          $('#checkAllTime').prop('checked', true);
          $('#formTime').hide();
        }          
        else
          $('#checkAllTime').prop('checked', false);
        //console.log(data);
    });

    $('#buttonDelete').click(function(event) {
      if (confirm("Вы уверены, что хотите удалить?")) 
        {
        $.ajax({
            url: "<?= base_url() ?>admin/announcements/delete_db/<?=$this->uri->segment(4)?>",
            success: function() {
              $("#formAlert1").removeClass("hide");
            }
        });
      }
    });

    $('#buttonUpdate').click(function(event) {
        var ts = Math.round((new Date()).getTime() / 1000);
      if($('#checkAllTime').is(":checked")) {
          var data = {
            title: $('#inputHeader').val(),
            text:  tinymce.get('inputText').getContent(),
            allTime: 1
          }
        }
        else {
          var data = {
            title: $('#inputHeader').val(),
            text:  tinymce.get('inputText').getContent(),
            start_datestamp:  Date.parse($('#inputDateTimeStart').val()).getTime()/1000,
            end_datestamp:  Date.parse($('#inputDateTimeEnd').val()).getTime()/1000,
            allTime: 0
          };
        }

        $.ajax({
            url: "<?= base_url() ?>admin/announcements/update_db/<?=$this->uri->segment(4)?>",
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
        //minDate:jQuery('#inputDateTimeStart').val()?jQuery('#inputDateTimeStart').val():false
       })
      },
      timepicker:true,
      mask:true
     });
    });
</script>
