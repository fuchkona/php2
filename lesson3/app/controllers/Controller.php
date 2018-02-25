<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 22.02.2018
 * Time: 21:23
 */

namespace app\controllers;

use app\classes\Router;
use app\classes\Twig;
use Twig_Environment;
use Twig_Loader_Filesystem;

abstract class Controller
{
    public static function render()
    {
        Twig::render();
    }

    public static function error404() {
        Router::setLayout('error');
        Router::setCurrentPage('404');
        self::render();
    }

}