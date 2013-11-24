
<script type="text/javascript" src="<?=base_url()?>js/bootstrap-select.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrap-select.min.css">

<script type="text/javascript">
    $(document).ready(function() {
        $('.selectpicker').selectpicker()
    })
</script>

<div class="container">
    <form action="<?=base_url()?>index.php/admin_shedule/add_db_binding" method="post">
        <?php foreach ($days as $day):?>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td rowspan="3" style="vertical-align: middle">Группа</td>
                    <td colspan="7" style="text-align: center; font-weight: bold;"><?=$day['date']?></td>
                </tr>
                <tr>
                    <?php foreach($timing as $item_num):?>
                        <td><?=$item_num['num']?></td>
                    <?php endforeach?>
                </tr>
                <tr>
                    <?php foreach($timing as $item_timing):?>
                        <td><?=$item_timing['start_time']?> - <?=$item_timing['end_time']?></td>
                    <?php endforeach?>
                </tr>
                <?php foreach($groups as $group):?>
                    <tr>
                        <td><?=$group['name']?></td>
                        <?php foreach($timing as $item_timing):?>
                            <td>
                                <select class="selectpicker" data-live-search="true" multiple name="binding_select[]">
                                    <optgroup label="Общие пары">
                                        <?php foreach($bindingSubjectGroup as $item):?>
                                            <?php foreach ($item as $item1):?>
                                                <?php if ($item1['idgroups'] == $group['idgroups']):?>
                                                    <option value="<?=$day['iddays']?>:<?=$group['idgroups']?>:<?=$item_timing['idlessons_time']?>:0:<?=$item1['idsubjects']?>" data-subtext="<?=$item1['teacher_fname']?> <?=$item1['teacher_patronymic']?> "><?=$item1['subject']?></option>
                                                <?php endif?>
                                            <?php endforeach?>
                                        <?php endforeach?>
                                    </optgroup>
                                    <optgroup label="1 подгруппа">
                                        <?php foreach($bindingSubjectGroup as $item):?>
                                            <?php foreach ($item as $item1):?>
                                                <?php if ($item1['idgroups'] == $group['idgroups']):?>
                                                    <option value="<?=$day['iddays']?>:<?=$group['idgroups']?>:<?=$item_timing['idlessons_time']?>:1:<?=$item1['idsubjects']?>" data-subtext="<?=$item1['teacher_fname']?> <?=$item1['teacher_patronymic']?> "><?=$item1['subject']?></option>
                                                <?php endif?>
                                            <?php endforeach?>
                                        <?php endforeach?>
                                    </optgroup>
                                    <optgroup label="2 подгруппа">
                                        <?php foreach($bindingSubjectGroup as $item):?>
                                            <?php foreach ($item as $item1):?>
                                                <?php if ($item1['idgroups'] == $group['idgroups']):?>
                                                    <option value="<?=$day['iddays']?>:<?=$group['idgroups']?>:<?=$item_timing['idlessons_time']?>:2:<?=$item1['idsubjects']?>" data-subtext="<?=$item1['teacher_fname']?> <?=$item1['teacher_patronymic']?> "><?=$item1['subject']?></option>
                                                <?php endif?>
                                            <?php endforeach?>
                                        <?php endforeach?>
                                    </optgroup>
                                </select>
                            </td>
                        <?php endforeach?>
                    </tr>
                <?php endforeach?>
                </tbody>
            </table>
        <?php endforeach?>
        <input type="submit" name="insert_data" class="btn btn-default">
    </form>
</div>