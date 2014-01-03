<script type="text/javascript" src="<?base_url()?>/js/datepicker/moment.js"></script>
<script type="text/javascript" src="<?base_url()?>/js/datepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?base_url()?>/js/datepicker/ui.datepicker-ru.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?base_url()?>/css/datepicker/daterangepicker-bs3.css" />
<script type="text/javascript">
    $(document).ready(function() {
        $('#reservation').daterangepicker(
            {
                ranges: {
                    'Сегодня': [moment(), moment()],
                    'Вчера': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'За последние 7 дней': [moment().subtract('days', 6), moment()],
                    'За последние 30 дней': [moment().subtract('days', 29), moment()],
                    'В этом месяце': [moment().startOf('month'), moment().endOf('month')],
                    'Прошлый месяц': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                startDate: moment(),
                endDate: moment(),
                separator: '&to='
            },
            function(start, end) {
                $('#reservation span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );
    });
</script>
<nav class="navbar navbar-default menu" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="container menu">
            <ul class="nav navbar-nav">
                <a class="navbar-brand" href="<?=base_url()?>">Расписание</a>
                <li><a href="http://xn--j1ajdidf.xn--p1ai/">ПФУРТК</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Фильтр<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?base_url()?>?filter=currently">Актуально</a></li>
                        <li class="divider"></li>
                        <li><a href="#" data-toggle="modal" data-target="#myModal">Выбрать диапозон</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li><a href="<?=base_url()?>admin">Админ</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Выбор диапазона расписания</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="text" class="form-control" id="reservation" />
                </div><!-- /input-group -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" onclick="redirect($('#reservation').val())">Открыть расписание</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    function redirect(range)
    {
        window.location.href = '<?=base_url()?>?from='+range;
    }
</script>