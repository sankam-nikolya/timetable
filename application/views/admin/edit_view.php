<table border="1" style="text-align: center">
    <tr>
        <td rowspan="3">Группа</td>
        <td colspan="7"><?=$pars[0]['formated_date'];?></td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
    </tr>
    <tr>
        <td>8 20 - 9 50</td>
        <td>10 00 - 11 30</td>
        <td>12 30 - 14 00</td>
        <td>14 10 - 15 40</td>
        <td>16 00 - 17 30</td>
        <td>17 40 - 19 10</td>
        <td>19 20 - 20 50</td>
    </tr>
    <? foreach($pars as $item): ?>
        <tr>
            <td><?echo $item['gp']?></td>
            <td><select style="width: 100%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><br><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select></td>
            <td><select style="width: 100%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><br><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select></td>
            <td><select style="width: 100%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><br><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select></td>
            <td><select style="width: 100%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><br><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select></td>
            <td><select style="width: 100%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><br><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select></td>
            <td><select style="width: 100%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><br><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select></td>
            <td><select style="width: 100%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><br><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select><select style="width: 50%"><?foreach($tt as $item):?><option><?=$item['name']?></option><?endforeach?></select></td>
            </tr>
    <? endforeach ?>
</table>
<br>