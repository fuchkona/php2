<?php

/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 22.02.2018
 * Time: 15:06
 */

namespace app\classes;

class App
{

    public static function init()
    {
        Router::init();

        $controller = [ 'app\\controllers\\' . ucfirst(Router::getLayout()) . 'Controller', Router::getCurrentPage() . 'Action'];

        $controller();

    }

}