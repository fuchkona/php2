<?php

/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 22.02.2018
 * Time: 15:06
 */

namespace app\classes;

use app\components\traits\SingletonTrait;
use app\controllers\Controller;

class App
{
    use SingletonTrait;

    private static $user;

    public static function init()
    {
        Router::init();
        Settings::init(Router::getSettingsPath());
        self::$user = AppUser::init();

        $controller = ['app\\controllers\\' . ucfirst(Router::getLayout()) . 'Controller', str_replace('-', '_', Router::getCurrentPage()) . 'Action'];

        if (is_callable($controller)) {
            try {
                $controller();
            } catch (\Exception $e) {
                Controller::error($e->getCode(), $e->getMessage(), $e->getTraceAsString());
            }
        } else {
            Controller::error404();
        }
    }

    /**
     * @return mixed
     */
    public static function getUser()
    {
        return self::$user;
    }



}