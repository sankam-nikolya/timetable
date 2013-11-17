<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p>
            <h1>Информация на текущую неделю</h1>
            <div class="well">
                <div class="row">
                    <div class="col-6 col-sm-6 col-lg-4">
                        <h2>Нагрузка групп</h2>
                        <?foreach ($short_group_num_pars as $item):?>
                            <p><?=$item['name']?> - <?if ($item['pars'] < 36):?><span style="color: red"><?=$item['pars']?></span><?else:?><span style="color: green"><?=$item['pars']?></span><?endif?> пар</p>
                        <?endforeach?>
                        <p><a class="btn btn-default" href="<?base_url()?>/admin/statistics#groups">Подробнее &rarr;</a></p>
                    </div>
                    <!--/span-->
                    <div class="col-6 col-sm-8 col-lg-6">
                        <h2>Нагрузка преподавателей</h2>
                        <?foreach ($short_num_pars as $item):?>
                            <p><?=$item['first_name']?> <?=$item['last_name']?> <?=$item['patronymic']?> - <?=$item['pars']?> пар</p>
                        <?endforeach?>
                        <p><a class="btn btn-default" href="<?base_url()?>/admin/statistics#teachers">Подробнее &rarr;</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="well sidebar-nav">
                <ul class="nav">
                    <li>
                        <a href="<?base_url()?>/admin/add"><i class="icon-plus"> Добавить</i></a>
                    </li>
                    <li>
                        <a href="<?base_url()?>/admin/edit"><i class="icon-edit"> Редактировать</i></a>
                    </li>
                </ul>
            </div>
            <!--/.well -->
        </div>
        <!--/span-->
    </div>
</div>
    <!--/row-->