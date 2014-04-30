<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/jquery.datetimepicker.css"/ >
<script src="<?=base_url()?>js/jquery.datetimepicker.js"></script>
<div class="container">

  <div id="formAlert" class="alert alert-success hide">
    <a class="close">×</a>
    <strong>Well done!</strong> You successfully update this ad.
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
        <hr>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button id="buttonUpdate" class="btn btn-primary">Обновить</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //$(document).ready(function(event) {
    	$.getJSON('<?= base_url() ?>admin/announcements/edit_data_json/<?=$this->uri->segment(4)?>', { get_param: 'value' }, function(data) {
    		$('#inputHeader').val(data[0]['title']);
    		$('#inputText').val(data[0]['text']);
        $('#inputDateTimeStart').val(data[0]['start_datestamp']);
        $('#inputDateTimeEnd').val(data[0]['end_datestamp']);
		});
    //});

    $('#buttonUpdate').click(function(event) {
        var data = {
            title: $('#inputHeader').val(),
            text:  $('#inputText').val(),
            start_datestamp:  $('#inputDateTimeStart').val(),
            end_datestamp:  $('#inputDateTimeEnd').val()
        };

        $.ajax({
            url: "<?= base_url() ?>admin/announcements/update_db/<?=$this->uri->segment(4)?>",
            type: 'POST',
            data: data,
            success: function() {
              $("#formAlert").removeClass("hide");
            }
        });
    });

    $(".alert").find(".close").on("click", function (e) {
        // Find all elements with the "alert" class, get all descendant elements with the class "close", and bind a "click" event handler
        e.stopPropagation();    // Don't allow the click to bubble up the DOM
        e.preventDefault();    // Don't let any default functionality occur (in case it's a link)
        $(this).closest(".alert").slideUp(400);    // Hide this specific Alert
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
