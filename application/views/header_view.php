<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Расписание</title>
    <link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
    <link href="<?= base_url() ?>css/style.css" rel="stylesheet">

    <script src="<?= base_url() ?>js/jquery.min.js"></script>
    <script src="<?= base_url() ?>js/bootstrap.js"></script>
    <link href="//fonts.googleapis.com/css?family=Ubuntu:400&subset=cyrillic,latin" rel="stylesheet" type="text/css" />

    <style>
        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('<?=base_url()?>fonts/glyphicons-halflings-regular.eot');
            src: url('<?=base_url()?>fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('<?=base_url()?>fonts/glyphicons-halflings-regular.woff') format('woff'), url('<?=base_url()?>fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('<?=base_url()?>fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg')
        }

        body {
            font-family: "Ubuntu", sans-serif;
        }
    </style>


    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
        $(function () {
            $(document).tooltip(
                {
                    track: true
                }
            );
        });
    </script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter22221844 = new Ya.Metrika({id:22221844,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/22221844" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43673861-3', 'xn--j1ajdidf.xn--p1ai');
  ga('send', 'pageview');

</script>

</head>
<body>