<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?if ($this->uri->segment(2) == "shedule" || $this->uri->rsegment(2) == "add" || $this->uri->rsegment(2) == "edit" || $this->uri->segment(2) == ""):?>class="active"<?endif?>>
                    <a href="<?base_url()?>/admin/shedule">Расписание</a>
                </li>
                <li <?if ($this->uri->rsegment(2) == "announcements"):?>class="active"<?endif?>>
                    <a href="<?base_url()?>/admin/announcements">Объявления</a>
                </li>
                <li>
                    <a href="#">Преподаватели</a>
                </li>
                <li <?if ($this->uri->rsegment(2) == "statistics"):?>class="active"<?endif?>>
                    <a href="<?base_url()?>/admin/statistics">Статистика</a>
                </li>

            </ul>
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a href="<?=base_url()?>">В расписание &rarr;</a>
                </li>

            </ul>

        </div>
        <!-- /.nav-collapse -->
    </div>
    <!-- /.container -->
</div>
<!-- /.navbar -->