<nav class="navbar navbar-default menu" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="container menu">
            <ul class="nav navbar-nav">
                <a class="navbar-brand" href="<?=base_url()?>">Расписание</a>
                <li><a href="http://xn--j1ajdidf.xn--p1ai/">ПФУРТК</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Фильтр<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?base_url()?>?filter=currently">Актуально</a></li>
                        <li><a href="<?base_url()?>?filter=all_day">Все дни</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Выбрать диапозон</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li><a href="<?=base_url()?>admin">Админ</a></li>
            </ul>
        </div>
    </div>
</nav>