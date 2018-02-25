<?php
define('HOME', __DIR__ );

spl_autoload_register(function ($className) {
    require_once HOME . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
});

require_once HOME . '/vendor/autoload.php';

\app\classes\App::init();