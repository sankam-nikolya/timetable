<div class="container">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-sm-1 control-label">Фильтр</label>
            <div class="col-sm-3">
                <select name="filter" class="form-control input-sm">
                    <option disabled>Выберите нужный фильтр</option>
                    <option <? if ($_GET['filter'] == 'currently'):?> selected <?endif?> value="currently">Актуальное</option>
                    <option <? if ($_GET['filter'] == 'all_day'):?> selected <?endif?> value="all_day">Все дни</option>
                    <option <? if ($_GET['filter'] == 'ftoday'):?> selected <?endif?> value="ftoday">На сегодня</option>
                    <option <? if ($_GET['filter'] == 'ftomorrow'):?> selected <?endif?> value="ftomorrow">На завтра</option>
                    <option <? if ($_GET['filter'] == 'flweek'):?> selected <?endif?> value="flweek">На прошлую неделю</option>
                    <option <? if ($_GET['filter'] == 'fweek'):?> selected <?endif?> value="fweek">На текущую неделю</option>
                    <option <? if ($_GET['filter'] == 'fnweek'):?> selected <?endif?> value="fnweek">На следующую неделю
                </select>
            </div>
            <label class="col-sm-1 control-label">Фильтр</label>
            <div class="col-sm-3">
                <select name="filter" class="form-control input-sm">
                    <option disabled>Выберите нужный фильтр</option>
                    <option <? if ($_GET['filter'] == 'currently'):?> selected <?endif?> value="currently">Актуальное</option>
                    <option <? if ($_GET['filter'] == 'all_day'):?> selected <?endif?> value="all_day">Все дни</option>
                    <option <? if ($_GET['filter'] == 'ftoday'):?> selected <?endif?> value="ftoday">На сегодня</option>
                    <option <? if ($_GET['filter'] == 'ftomorrow'):?> selected <?endif?> value="ftomorrow">На завтра</option>
                    <option <? if ($_GET['filter'] == 'flweek'):?> selected <?endif?> value="flweek">На прошлую неделю</option>
                    <option <? if ($_GET['filter'] == 'fweek'):?> selected <?endif?> value="fweek">На текущую неделю</option>
                    <option <? if ($_GET['filter'] == 'fnweek'):?> selected <?endif?> value="fnweek">На следующую неделю
                </select>
            </div>
            <input type="submit" value="Применить" class="btn btn-primary btn-sm">

        </div>
        <span style="color: gray">
            <?
            echo 'Время сервера: ' . strftime('%A %F %H:%M:%S', time());
            ?>
        </span>
    </form>

</div>
