<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $( "#reservation" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });  
</script>  
<div class="container">
    <?php if (isset($_GET['response'])): ?>
        <?php if ($_GET['response'] == 'success'): ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>Расписание успешно обновлено! <a href="<?= base_url() ?>">В расписание &rarr;</a></p>
            </div>
        <?php endif ?>
    <?php endif ?>
    <h2>Редактирование существующего расписания</h2>

    <div class="well">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="reservation">Выберите дату:</label>

                    <div class="input-group" style="width: 350px">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="text" class="form-control" name="datepick" id="reservation"/>

                        <div class="input-group-btn">
                            <button class="btn btn-default" onclick="open_days($('#reservation').val())">Открыть</button>
                        </div>
                        <!-- /btn-group -->
                    </div>
                    <!-- /input-group -->
                </div>
            </fieldset>
    </div>
</div>
<script type="text/javascript">
    function open_days(range)
    {
        window.location.href = '<?=base_url()?>index.php/admin_shedule/edit_shedule_view/?from=' + range + '&to=' + range;
    }
</script>