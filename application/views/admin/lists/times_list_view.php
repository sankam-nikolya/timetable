<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Номер</th>
                    <th>Время начала пары</th>
                    <th>Время окончания пары</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($times as $time):?>
                <tr style="text-align: left">
                    <td><?=$time['idlessons_time']?></td>
                    <td><?=$time['num']?></td>
                    <td>
                        <div class="input-append bootstrap-timepicker">
                            <input id="timepicker1" type="text" class="input-small" value="<?=$time['start_time']?>">
                            <span class="add-on"><i class="icon-time"></i></span>
                        </div>
                    </td>
                    <td>
                        <div class="input-append bootstrap-timepicker">
                            <input id="timepicker2" type="text" class="input-small" value="<?=$time['end_time']?>">
                            <span class="add-on"><i class="icon-time"></i></span>
                        </div>
                    </td>
                </tr>
                <?php endforeach?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-3">
            <div class="well sidebar-nav">
                <ul class="nav">
                    <li>
                        <a href="<?=base_url()?>index.php/admin_shedule/teacher_add_view"><span class="glyphicon glyphicon-plus"> Добавить</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/js/bootstrap-timepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/bootstrap-timepicker.min.css">
<script type="text/javascript">
    $(document).ready(function(){
        $('#timepicker1').timepicker(); 
        $('#timepicker2').timepicker();    
    });
</script>