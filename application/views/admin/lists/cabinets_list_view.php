<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cabinets as $cabinet): ?>
                    <tr style="text-align: left">
                        <td><?= $cabinet['idcabinets'] ?></td>
                        <td>
                            <a href="<?= base_url() ?>index.php/admin_shedule/cabinet_edit_view/?id=<?= $cabinet['idcabinets'] ?>"><?= $cabinet['name'] ?></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-3">
            <div class="well sidebar-nav">
                <ul class="nav">
                    <li>
                        <a href="<?= base_url() ?>index.php/admin_shedule/cabinet_add_view"><span
                                class="glyphicon glyphicon-plus"> Добавить</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>