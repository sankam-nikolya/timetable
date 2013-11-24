<div class="container">
    <table class="table table-bordered">
        <tr>
            <td rowspan="3" style="vertical-align: middle">Группа</td>
            <td colspan="7" style="text-align: center; font-weight: bold;"><?=$day_for_now['formated_date']?></td>
        </tr>
        <tr>
            <?php foreach($pars_timing as $item_num):?>
                <td><?=$item_num['num']?></td>
            <?php endforeach?>
        </tr>
        <tr>
            <?php foreach($pars_timing as $item_timing):?>
                <td><?=$item_timing['start_time']?> - <?=$item_timing['end_time']?></td>
            <?php endforeach?>
        </tr>

