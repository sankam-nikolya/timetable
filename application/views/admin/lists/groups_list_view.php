<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Тип</th>
                    <th>Активность</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($groups as $group): ?>
                    <tr style="text-align: left">
                        <td><?= $group['idgroups'] ?></td>
                        <td>
                            <a href="<?= base_url() ?>index.php/admin_shedule/group_edit_view/?id=<?= $group['idgroups'] ?>"><?= $group['name'] ?></a>
                        </td>
                        <td><?php if ($group['fulltime'] == 1): ?>Очная<?php else: ?>Заочная<?php endif ?></td>
                        <td><?php if ($group['active'] == 1): ?>Активена <?php else: ?>Не активеная<?php endif ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-3">
            <div class="well sidebar-nav">
                <ul class="nav">
                    <li>
                        <a href="<?= base_url() ?>index.php/admin_shedule/group_add_view"><span
                                class="glyphicon glyphicon-plus"> Добавить</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>