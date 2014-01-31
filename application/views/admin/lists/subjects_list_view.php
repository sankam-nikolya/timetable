<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Полное название</th>
                    <th>Краткое название</th>
                    <th>Активность</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($subjects as $subject): ?>
                    <tr style="text-align: left">
                        <td><?= $subject['idsubects'] ?></td>
                        <td>
                            <a href="<?= base_url() ?>index.php/admin_shedule/subject_edit_view/?id=<?= $subject['idsubects'] ?>"><?= $subject['full_name'] ?></a>
                        </td>
                        <td><?= $subject['name'] ?></td>
                        <td><?php if ($subject['active'] == 1): ?>Активен <?php else: ?>Не активен<?php endif ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-3">
            <div class="well sidebar-nav">
                <ul class="nav">
                    <li>
                        <a href="<?= base_url() ?>index.php/admin_shedule/subject_add_view"><span
                                class="glyphicon glyphicon-plus"> Добавить</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>