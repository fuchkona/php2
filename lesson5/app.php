<?php
use app\classes\App;

session_start();

define('HOME', __DIR__ );

spl_autoload_register(function ($className) {
    require_once HOME . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
});

require_once HOME . '/vendor/autoload.php';

App::init();