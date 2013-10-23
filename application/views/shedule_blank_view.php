<div class="container">

    <table class="table table-bordered">
        <tr>
            <td rowspan="3">Группа</td>
            <td colspan="7" style="text-align: center; font-weight: bold;"><?=$day_for_now['date']?></td>
        </tr>
        <tr>
            <?foreach($pars_timing as $item_num):?>
                <td><?=$item_num['num']?></td>
            <?endforeach?>
        </tr>
        <tr>
            <?foreach($pars_timing as $item_timing):?>
                <td><?=$item_timing['start_time']?> - <?=$item_timing['end_time']?></td>
            <?endforeach?>
        </tr>

