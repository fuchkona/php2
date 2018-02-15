<?php
use engine\classes\App;
use engine\classes\Router;

if ($user = App::getUser()) {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin panel</title>
        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/main_new.css">
        <link rel="stylesheet" href="/css/admin.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="shortcut icon" href="/images/logo.png" type="image/png">
        <script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    </head>
    <body>
    <body>
    <div class="wrapper">
        <?php require_once __DIR__ . '/admin/header.php' ?>
        <?php require_once __DIR__ . '/admin/top_navigation.php' ?>
        <!-- Content -->
        <div class="spaced-container">
            <?php
            if (Router::getCurrentPage()) {
                require_once Router::getFullPathToCurrentPage();
            } else {
                ?>
                <h2>Sorry! Page not found!</h2>
                <?php
            }
            ?>
        </div>
    </div>
    </body>
    </html>
<?php } else { ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ERROR</title>
    </head>
    <body>
    <h1>You don't have access to this page!</h1>
    </body>
    </html>
<?php } ?>
