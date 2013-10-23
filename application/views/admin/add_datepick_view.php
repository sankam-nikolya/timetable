<script type="text/javascript">
    $(document).ready(function() {
        $('#reservation').daterangepicker({
        });
    });
</script>
<link rel="stylesheet" type="text/css" media="all" href="<?base_url()?>/css/datepicker/daterangepicker-bs3.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="<?base_url()?>/js/datepicker/moment.js"></script>
<script type="text/javascript" src="<?base_url()?>/js/datepicker/daterangepicker.js"></script>

<div class="container">
    <div class="well">
        <form class="form-horizontal" method="post">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="reservation">Выберите дату:</label>
                    <div class="input-group" style="width: 300px">
                        <input type="text" class="form-control" name="datepick" <?if (isset($_GET['datepick'])):?>value="<?=$_GET['datepick']?>"<?endif?> id="reservation" />
                        <div class="input-group-btn">
                            <input type="submit" class="btn btn-default" name="insert_day">
                        </div><!-- /btn-group -->
                    </div><!-- /input-group -->
                </div>
            </fieldset>
        </form>
    </div>
</div>

