<?php

header ('HTTP/1.0 503 Service Unavailable');

header ('Retry-After: 3600');

?>

<html>

<head>

    <title>Ведутся работы</title>
    <meta charset="utf-8">

</head>

<body style="background-image: url(http://nrasp.ru/css/bg_offline.jpg); background-position: center;">

<div style="margin-left: 25%; background-color: rgba(0, 0, 0, 0.32); margin-right: 25%; display: table;">
    <div style="padding: 1px 60px 5px 60px; color: #3875d7">
        <h1>Сайт закрыт на техническое обслуживание.</h1>

        <h3>Извините за предоставленные неудобства!</h3>
    </div>

</div>

</body>

</html>
