<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Админ-панель</title>

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
    </style>

</head>
<body>