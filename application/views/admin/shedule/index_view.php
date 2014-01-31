<div class="container">
    <div class="row">        
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas pull-right" id="sidebar">
            <div class="well sidebar-nav">
                <ul class="nav">
                    <li>
                        <a href="<?= base_url() ?>admin/shedule/add"><span
                                class="glyphicon glyphicon-plus"> Добавить</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/shedule/edit"><span class="glyphicon glyphicon-edit"> Редактировать</span></a>
                    </li>
                </ul>
            </div>
            <!--/.well -->
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php if (count($n_short_group_num_pars_0) > 0):?>
                <h1>Информация на следующую неделю</h1>

                <div class="well">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-lg-4">
                            <h2>Нагрузка групп</h2>
                            <p><b>Общие пары</b></p>
                            <?php foreach ($n_short_group_num_pars_0 as $item): ?>
                                <p><?= $item['name'] ?> - <?php if ($item['pars'] < 18): ?><span
                                        style=""><?= $item['pars'] ?> пар (<?= $item['pars'] * 2 ?>
                                        часов)</span><?php else: ?><span style=""><?= $item['pars'] ?> пар
                                        (<?= $item['pars'] * 2 ?> часов)</span><?php endif ?></p>
                            <?php endforeach ?>
                            <hr>
                            <p><b>Первые подгруппы</b></p>
                            <?php foreach ($n_short_group_num_pars_1 as $item): ?>
                                <p><?= $item['name'] ?> - <?php if ($item['pars'] < 18): ?><span
                                        style=""><?= $item['pars'] ?> пар (<?= $item['pars'] * 2 ?>
                                        часов)</span><?php else: ?><span style=""><?= $item['pars'] ?> пар
                                        (<?= $item['pars'] * 2 ?> часов)</span><?php endif ?></p>
                            <?php endforeach ?>
                            <hr>
                            <p><b>Вторые подгруппы</b></p>
                            <?php foreach ($n_short_group_num_pars_2 as $item): ?>
                                <p><?= $item['name'] ?> - <?php if ($item['pars'] < 18): ?><span
                                        style=""><?= $item['pars'] ?> пар (<?= $item['pars'] * 2 ?>
                                        часов)</span><?php else: ?><span style=""><?= $item['pars'] ?> пар
                                        (<?= $item['pars'] * 2 ?> часов)</span><?php endif ?></p>
                            <?php endforeach ?>
                            <hr>

                            <p><a class="btn btn-default"
                                  href="<?= base_url() ?>admin/statistics#groups">Подробнее &rarr;</a></p>
                        </div>
                        <!--/span-->
                        <div class="col-6 col-sm-8 col-lg-6">
                            <h2>Нагрузка преподавателей</h2>
                            <?php foreach ($n_short_num_pars as $item): ?>
                                <p><?= $item['last_name'] ?> <?= $item['first_name'] ?> <?= $item['patronymic'] ?>
                                    - <?= $item['pars'] ?> пар</p>
                            <?php endforeach ?>
                            <p><a class="btn btn-default"
                                  href="<?= base_url() ?>admin/statistics#teachers">Подробнее &rarr;</a></p>
                        </div>
                    </div>
                </div>
            <?php endif?>
        </div>
        
        <div class="col-xs-12 col-sm-9">
            <h1>Информация на текущую неделю</h1>

            <div class="well">
                <div class="row">
                    <div class="col-6 col-sm-6 col-lg-4">
                        <h2>Нагрузка групп</h2>
                        <p><b>Общие пары</b></p>
                        <?php foreach ($short_group_num_pars_0 as $item): ?>
                            <p><?= $item['name'] ?> - <?php if ($item['pars'] < 18): ?><span
                                    style=""><?= $item['pars'] ?> пар (<?= $item['pars'] * 2 ?>
                                    часов)</span><?php else: ?><span style=""><?= $item['pars'] ?> пар
                                    (<?= $item['pars'] * 2 ?> часов)</span><?php endif ?></p>
                        <?php endforeach ?>
                        <hr>
                        <p><b>Первые подгруппы</b></p>
                        <?php foreach ($short_group_num_pars_1 as $item): ?>
                            <p><?= $item['name'] ?> - <?php if ($item['pars'] < 18): ?><span
                                    style=""><?= $item['pars'] ?> пар (<?= $item['pars'] * 2 ?>
                                    часов)</span><?php else: ?><span style=""><?= $item['pars'] ?> пар
                                    (<?= $item['pars'] * 2 ?> часов)</span><?php endif ?></p>
                        <?php endforeach ?>
                        <hr>
                        <p><b>Вторые подгруппы</b></p>
                        <?php foreach ($short_group_num_pars_2 as $item): ?>
                            <p><?= $item['name'] ?> - <?php if ($item['pars'] < 18): ?><span
                                    style=""><?= $item['pars'] ?> пар (<?= $item['pars'] * 2 ?>
                                    часов)</span><?php else: ?><span style=""><?= $item['pars'] ?> пар
                                    (<?= $item['pars'] * 2 ?> часов)</span><?php endif ?></p>
                        <?php endforeach ?>
                        <hr>
                        <p><a class="btn btn-default"
                              href="<?= base_url() ?>admin/statistics#groups">Подробнее &rarr;</a></p>
                    </div>
                    <!--/span-->
                    <div class="col-6 col-sm-8 col-lg-6">
                        <h2>Нагрузка преподавателей</h2>
                        <?php foreach ($short_num_pars as $item): ?>
                            <p><?= $item['last_name'] ?> <?= $item['first_name'] ?> <?= $item['patronymic'] ?>
                                - <?= $item['pars'] ?> пар</p>
                        <?php endforeach ?>
                        <p><a class="btn btn-default"
                              href="<?= base_url() ?>admin/statistics#teachers">Подробнее &rarr;</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->

        <!--/span-->
    </div>
</div>
<!--/row-->