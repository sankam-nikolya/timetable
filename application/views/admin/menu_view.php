<div class="navbar navbar-default" role="navigation">
    <div class="container menu">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if ($this->uri->rsegment(1) == "admin_shedule"):?>class="active"<?php endif?>
                    class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Расписание<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li role="presentation" class="dropdown-header">Основное</li>
                        <li <?php if ($this->uri->rsegment(1) == "admin_shedule" && $this->uri->rsegment(2) == "index"):?>class="active"<?php endif?>>
                            <a href="<?=base_url()?>admin/shedule">Краткая информация</a>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Редактировать расписание</li>
                        <li <?php if ($this->uri->rsegment(1) == "admin_shedule" && ($this->uri->rsegment(2) == "add_datepick_view" || $this->uri->rsegment(2) == "add_shedule_view")):?>class="active"<?php endif?>>
                            <a href="<?=base_url()?>admin/shedule/add">Добавить</a>
                        </li>
                        <li <?php if ($this->uri->rsegment(1) == "admin_shedule" && ($this->uri->rsegment(2) == "edit_datepick_view" || $this->uri->rsegment(2) == "edit_shedule_view")):?>class="active"<?php endif?>>
                            <a href="<?=base_url()?>admin/shedule/edit">Редактировать</a>
                        </li>
                        <li <?php if ($this->uri->rsegment(1) == "admin_shedule" && ($this->uri->rsegment(2) == "edit_datepick_audit_view" || $this->uri->rsegment(2) == "edit_audit_view")):?>class="active"<?php endif?>>
                            <a href="<?=base_url()?>admin/audit/edit">Кабинеты</a>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Редактировать списки</li>
                        <li
                            <?php if ($this->uri->rsegment(1) == "admin_shedule" && ($this->uri->rsegment(2) == "teachers_list_view" || $this->uri->rsegment(2) == "teacher_edit_view" || $this->uri->rsegment(2) == "teacher_add_view")):?>class="active"<?php endif?>
                            ><a href="<?=base_url()?>admin/teachers">Преподаватели</a></li>
                        <li
                            <?php if ($this->uri->rsegment(1) == "admin_shedule" && ($this->uri->rsegment(2) == "subjects_list_view" || $this->uri->rsegment(2) == "subject_edit_view" || $this->uri->rsegment(2) == "subject_add_view")):?>class="active"<?php endif?>
                            ><a href="<?=base_url()?>admin/subjects">Предметы</a></li>
                    </ul>
                </li>
                <li <?php if ($this->uri->rsegment(2) == "announcements"):?>class="active"<?php endif?>>
                    <a href="<?=base_url()?>admin/announcements">Объявления</a>
                </li>
                <li <?php if ($this->uri->rsegment(1) == "admin_statistics" && $this->uri->rsegment(2) == "statistics"):?>class="active"<?php endif?>>
                    <a href="<?=base_url()?>admin/statistics">Статистика</a>
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