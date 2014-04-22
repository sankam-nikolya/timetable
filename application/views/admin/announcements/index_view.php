<div class="container">
	<div class="row">
        <div class="col-lg-9">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Время начала</th>
                    <th>Время окончания</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($ads as $ad):?>
                <tr style="text-align: left">
                    <td><?=$ad['idannouncements']?></td>
                    <td><a href=""><?=$ad['title']?></a></td>
                    <td><?=$ad['start_datestamp']?></td>
                    <td><?=$ad['end_datestamp']?></td>
                </tr>
                <?php endforeach?>
                </tbody>
            </table>
            <?=$pagination?>
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