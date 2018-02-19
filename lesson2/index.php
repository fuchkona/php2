<?php
define('HOME', __DIR__);

spl_autoload_register(function ($className) {
    require_once HOME . DIRECTORY_SEPARATOR . $className . '.php';
});

use classes\Good;
use classes\Single;
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 2 by Nik</title>
</head>
<body>

</body>
</html>