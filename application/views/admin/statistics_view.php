<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {

        // Radialize the colors
        Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        });

        // Build the chart
        $('#teachers').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Доля уроков у преподавателей'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function () {
                            return '<b>' + this.point.name + '</b>: ' + Math.round(this.percentage) + ' %';
                        }
                    }
                }
            },
            series: [
                {
                    type: 'pie',
                    name: 'Всего уроков',
                    data: [
                        <?php foreach ($num_pars as $item):?>
                        ['<?=$item['first_name']; echo ' '.$item['patronymic']?>', <?=$item['pars']?>],
                        <?php endforeach?>
                    ]
                }
            ]
        });
        // Build the chart
        $('#groups').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Доля уроков у групп'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function () {
                            return '<b>' + this.point.name + '</b>: ' + Math.round(this.percentage) + ' %';
                        }
                    }
                }
            },
            series: [
                {
                    type: 'pie',
                    name: 'Всего уроков',
                    data: [
                        <?foreach ($group_num_pars as $item):?>
                        ['<?=$item['name']?>', <?=$item['pars']?>],
                        <?endforeach?>
                    ]
                }
            ]
        });
    })


</script>
<script type="text/javascript" src="<?= base_url() ?>js/stats/swfobject.js"></script>
<script src="<?= base_url() ?>js/charts/highcharts.js"></script>
<script src="<?= base_url() ?>js/charts/modules/exporting.js"></script>

<div class="container">
    <a name="teachers"></a>

    <div id="teachers"></div>
    <a name="groups"></a>

    <div id="groups"></div>
    <br>

    <div id="visitors" align="center" style="padding-bottom:80px">
        <a href="http://www.liveinternet.ru/stat/%D1%80%D0%B0%D1%81%D0%BF%D0%B8%D1%81%D0%B0%D0%BD%D0%B8%D0%B5.%D0%BF%D1%84%D1%83%D1%80%D1%82%D0%BA.%D1%80%D1%84/index.html?"><img src="http://www.liveinternet.ru/stat/%D1%80%D0%B0%D1%81%D0%BF%D0%B8%D1%81%D0%B0%D0%BD%D0%B8%D0%B5.%D0%BF%D1%84%D1%83%D1%80%D1%82%D0%BA.%D1%80%D1%84/index.gif?graph=yes"></a>
    </div>
    </script>
</div>
