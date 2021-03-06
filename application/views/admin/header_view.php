<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Админ-панель</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css?<?=CSS_VERSION?>">
    <script type="text/javascript" src="<?= base_url() ?>js/jquery-1.10.2.min.js"></script>
    <script src="<?= base_url() ?>js/bootstrap.min.js"></script>
    <link href="//fonts.googleapis.com/css?family=Ubuntu:400&subset=cyrillic,latin" rel="stylesheet" type="text/css" />

    <style type="text/css">
        footer {
            padding-left: 15px;
            padding-right: 15px;
        }

            /*       * Off Canvas       * --------------------------------------------------       */
        @media screen and(max-width: 768px) {
            .row-offcanvas {
                position: relative;
                -webkit-transition: all 0.25s ease-out;
                -moz-transition: all 0.25s ease-out;
                transition: all 0.25s ease-out;
            }

            .row-offcanvas-right .sidebar-offcanvas {
                right: -50%;
                /* 6 columns */
            }

            .row-offcanvas-left .sidebar-offcanvas {
                left: -50%;
                /* 6 columns */
            }

            .row-offcanvas-right.active {
                right: 50%;
                /* 6 columns */
            }

            .row-offcanvas-left.active {
                left: 50%;
                /* 6 columns */
            }

            .sidebar-offcanvas {
                position: absolute;
                top: 0;
                width: 50%;
                /* 6 columns */
            }
        }

        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('<?=base_url()?>fonts/glyphicons-halflings-regular.eot');
            src: url('<?=base_url()?>fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('<?=base_url()?>fonts/glyphicons-halflings-regular.woff') format('woff'), url('<?=base_url()?>fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('<?=base_url()?>fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg')
        }

        body {
            font-family: "Ubuntu", sans-serif;
        }
    </style>

</head>
<body>