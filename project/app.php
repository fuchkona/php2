<?php

define("HOME", __DIR__);

spl_autoload_register(function ($class_name) {
    require_once HOME .  '\\' . $class_name . '.php';
});

session_start();

\engine\classes\App::init();
