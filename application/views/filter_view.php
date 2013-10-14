<div class="container">
    <div class="well-small">
        <form action="" method="get" style="font-size: 15px">
            Фильтр:
            <select name="filter">
                <option disabled>Выберите нужный фильтр</option>
                <option <? if ($_GET['filter'] == 'last7days'):?> selected <?endif?> value="last7days">Актуальное</option>
                <option <? if ($_GET['filter'] == 'all_day'):?> selected <?endif?> value="all_day">Все дни</option>
                <option <? if ($_GET['filter'] == 'ftoday'):?> selected <?endif?> value="ftoday">На сегодня</option>
                <option <? if ($_GET['filter'] == 'ftomorrow'):?> selected <?endif?> value="ftomorrow">На завтра</option>
                <option <? if ($_GET['filter'] == 'flweek'):?> selected <?endif?> value="flweek">На прошлую неделю</option>
                <option <? if ($_GET['filter'] == 'fweek'):?> selected <?endif?> value="fweek">На текущую неделю</option>
                <option <? if ($_GET['filter'] == 'fnweek'):?> selected <?endif?> value="fnweek">На следующую неделю
            </select>
            <input type="submit" value="Применить" class="btn btn-primary btn-mini" style="height: 26px; margin-top: -5px">
        </form>
        <span style="text-align: right;font-size: 14px; color: gray">
            <?
            echo 'Время сервера: ' . strftime('%A %F %H:%M:%S', time());
            ?>
        </span>
    </div>
</div>