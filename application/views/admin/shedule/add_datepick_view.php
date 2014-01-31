<script type="text/javascript">
    $(document).ready(function () {
        $('#reservation').daterangepicker({
        });
    });
</script>
<link rel="stylesheet" type="text/css" media="all" href="<? base_url() ?>/css/datepicker/daterangepicker-bs3.css"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="<? base_url() ?>/js/datepicker/moment.js"></script>
<script type="text/javascript" src="<? base_url() ?>/js/datepicker/daterangepicker.js"></script>

<div class="container">
    <?php if (isset($_GET['response'])): ?>
        <?php if ($_GET['response'] == 'success'): ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>Расписание успешно обновлено! <a href="<?= base_url() ?>">В расписание &rarr;</a></p>
            </div>
        <?php endif ?>
    <?php endif ?>
    <h2>Добавление нового расписания</h2>

    <div class="well">
        <form class="form-horizontal" method="post" action="<?= base_url() ?>index.php/admin_shedule/add_shedule_view">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="reservation">Выберите дату:</label>

                    <div class="input-group" style="width: 350px">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="text" class="form-control" name="datepick"
                               <? if (isset($_POST['datepick'])): ?>value="<?= $_POST['datepick'] ?>"<? endif ?>
                               id="reservation"/>

                        <div class="input-group-btn">
                            <input type="submit" class="btn btn-default">
                        </div>
                        <!-- /btn-group -->
                    </div>
                    <!-- /input-group -->
                </div>
            </fieldset>
        </form>
    </div>
</div>

