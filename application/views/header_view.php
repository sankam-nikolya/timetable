<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Расписание</title>
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link href="<?=base_url()?>css/style.css" rel="stylesheet">

    <script src="<?=base_url()?>js/jquery.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />

    <style>
        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('<?=base_url()?>fonts/glyphicons-halflings-regular.eot');
            src: url('<?=base_url()?>fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('<?=base_url()?>fonts/glyphicons-halflings-regular.woff') format('woff'), url('<?=base_url()?>fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('<?=base_url()?>fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg')
        }
        body {
            font-family: "Open Sans", sans-serif;
        }
    </style>


    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
        $(function() {
            $( document ).tooltip(
                {
                    track: true
                }
            );
        });
    </script>
    
</head>
<body>