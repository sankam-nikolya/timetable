
<script type="text/javascript" src="<?=base_url()?>js/bootstrap-select.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrap-select.min.css">

<script type="text/javascript">
    $(document).ready(function() {
        $('.selectpicker').selectpicker()
    })
</script>

<div class="container">
    <form action="" method="post" name="data">
        <?foreach ($days as $day):?>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td rowspan="3" style="vertical-align: middle">Группа</td>
                <td colspan="7" style="text-align: center; font-weight: bold;"><?=$day['date']?></td>
            </tr>
            <tr>
                <?foreach($timing as $item_num):?>
                    <td><?=$item_num['num']?></td>
                <?endforeach?>
            </tr>
            <tr>
                <?foreach($timing as $item_timing):?>
                    <td><?=$item_timing['start_time']?> - <?=$item_timing['end_time']?></td>
                <?endforeach?>
            </tr>
            <?foreach($groups as $group):?>
                <tr>
                    <td><?=$group['name']?></td>
                    <?foreach($timing as $item_timing):?>
                        <td>
                            <select class="selectpicker" data-live-search="true" multiple name="<?=$day['iddays']?>:<?=$group['idgroups']?>:<?=$item_timing['idlessons_time']?>">
                                <optgroup label="Общие пары">
                                    <?foreach($bindingSubjectGroup as $item):?>
                                        <?foreach ($item as $item1):?>
                                            <?if ($item1['idgroups'] == $group['idgroups']):?>
                                                <option value="type=0:subject=<?=$item1['idsubjects']?>" data-subtext="<?=$item1['teacher_fname']?> <?=$item1['teacher_patronymic']?> "><?=$item1['subject']?></option>
                                            <?endif?>
                                        <?endforeach?>
                                    <?endforeach?>
                                </optgroup>
                                <optgroup label="1 подгруппа">
                                    <?foreach($bindingSubjectGroup as $item):?>
                                        <?foreach ($item as $item1):?>
                                            <?if ($item1['idgroups'] == $group['idgroups']):?>
                                                <option value="type=1:subject=<?=$item1['idsubjects']?>" data-subtext="<?=$item1['teacher_fname']?> <?=$item1['teacher_patronymic']?> "><?=$item1['subject']?></option>
                                            <?endif?>
                                        <?endforeach?>
                                    <?endforeach?>
                                </optgroup>
                                <optgroup label="2 подгруппа">
                                    <?foreach($bindingSubjectGroup as $item):?>
                                        <?foreach ($item as $item1):?>
                                            <?if ($item1['idgroups'] == $group['idgroups']):?>
                                                <option value="type=2:subject=<?=$item1['idsubjects']?>" data-subtext="<?=$item1['teacher_fname']?> <?=$item1['teacher_patronymic']?> "><?=$item1['subject']?></option>
                                            <?endif?>
                                        <?endforeach?>
                                    <?endforeach?>
                                </optgroup>
                            </select>
                        </td>
                    <?endforeach?>
                </tr>
            <?endforeach?>
            </tbody>
        </table>
        <?endforeach?>
        <input type="submit" name="insert_data" class="btn btn-default">
    </form>
</div>