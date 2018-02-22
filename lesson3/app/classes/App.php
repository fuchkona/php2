<?php

/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 22.02.2018
 * Time: 15:06
 */

namespace app\classes;

use Twig_Environment;
use Twig_Loader_Filesystem;

class App
{
    private static $params;

    public static function init()
    {
        Router::init();
        self::$params = Router::getParams();

        $loader = new Twig_Loader_Filesystem(HOME . '/templates');

        $twig = new Twig_Environment($loader);

        $template = $twig->load(Router::getLayout() . '/' . Router::getCurrentPage() .'.tmpl');

        echo $template->render();
    }

    public static function getParam($key)
    {
        if (isset(self::$params[$key]) && self::$params[$key]) {
            return self::$params[$key];
        }
        return null;
    }

}