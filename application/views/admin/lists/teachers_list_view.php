<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Видимость</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($teachers as $teacher):?>
                <tr style="text-align: left">
                    <td><?=$teacher['idteacher']?></td>
                    <td><a href="<?=base_url()?>index.php/admin_shedule/teacher_edit_view/?id=<?=$teacher['idteacher']?>"><?=$teacher['last_name']?> <?=$teacher['first_name']?> <?=$teacher['patronymic']?></a></td>
                    <td><?php if ($teacher['visibility'] == 1):?>Видимый <?php else:?>Не видимый<?php endif?></td>
                </tr>
                <?php endforeach?>
                </tbody>
            </table>
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