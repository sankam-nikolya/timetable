<script src="<?= base_url() ?>js/charts/highcharts.js"></script>
<script src="<?= base_url() ?>js/charts/modules/exporting.js"></script>

<div class="container">
    <a name="groups"></a>

    <div id="groups"></div>
    <br>

    <div id="visitors" align="center" style="padding-bottom:80px">
        <img style="width: 100%;" src="<?= base_url() ?>/images/stat_visitors_month.png">
    </div>
    <div id="browsers" align="center" style="padding-bottom:80px">
        <img style="width: 100%;" src="<?= base_url() ?>/images/stat_browsers.png">
    </div>
    <div id="sa" align="center" style="padding-bottom:80px">
        <img src="<?= base_url() ?>/images/stat_sa.png">
    </div>
    <div id="mobile_vendors" align="center" style="padding-bottom:80px">
        <img src="<?= base_url() ?>/images/stat_mobile_vendors.png">
    </div>
</div>
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
        $('#groups').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Доля пар у групп'
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
                    name: 'Всего пар',
                    data: [
                        <?php foreach ($group_num_pars as $item):?>
                        ['<?=$item['name']?>', <?=$item['pars']?>],
                        <?php endforeach?>
                    ]
                }
            ]
        });
    })
</script>
