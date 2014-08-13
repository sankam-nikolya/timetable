<div class="container">
	<div class="row">
        <div class="col-lg-9">
            <?php if(count($ads) > 0):?>
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
                    <td><?php if (trim($ad['title']) == ""):?>
                        <a href="<?=base_url()?>admin/announcements/edit/<?=$ad['idannouncements']?>">//БЕЗ НАЗВАНИЯ</a>
                    <?php else:?>
                    <a href="<?=base_url()?>admin/announcements/edit/<?=$ad['idannouncements']?>"><?=$ad['title']?></a>
                    <?php endif?></td>
                    <td><?php if ($ad['allTime'] == "1"):?>
                        Без ограничений по времени
                    <?php else:?>
                    <?=$ad['start_datestamp']?>
                    <?php endif?></td>
                    <td><?php if ($ad['allTime'] == "1"):?>
                        Без ограничений по времени
                    <?php else:?>
                    <?=$ad['end_datestamp']?>
                    <?php endif?></td>
                </tr>
                <?php endforeach?>
                </tbody>
            </table>
            <?=$pagination?>
            <?php else:?>
            <div class="well">
                <h3>Объявлений пока нет</h3>
            </div>
            <?php endif?>
        </div>
        <div class="col-lg-3">
            <div class="well sidebar-nav">
                <ul class="nav">
                    <li>
                        <a href="<?=base_url()?>admin/announcements/add"><span class="glyphicon glyphicon-plus"> Добавить</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>