<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p>
            <div class="row">
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Информация на текущую неделю</h2>
                    <?foreach ($groups as $group):?>
                        <p><?=$group['name']?></p>
                    <?endforeach?>
                    <p><a class="btn btn-default" href="#">Подробнее &rarr;</a></p>
                </div>
                <!--/span-->
                <div class="col-6 col-sm-8 col-lg-6">
                    <h2>Нагрузка преподавателей</h2>
                    <?foreach ($teachers as $teacher):?>
                        <p><?=$teacher['first_name']?> <?=$teacher['last_name']?> <?=$teacher['patronymic']?> </p>
                    <?endforeach?>
                    <p><button class="btn btn-default" href="#">Подробнее &rarr;</button></p>
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/span-->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="well sidebar-nav">
                <ul class="nav">
                    <li class="nav-header">123</li>
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
    <!--/row-->