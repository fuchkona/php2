<?php

/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 22.02.2018
 * Time: 15:06
 */

namespace app\classes;

use app\classes\ar\Auth;
use app\classes\ar\User;
use app\controllers\Controller;

class App
{
    private static $user;

    public static function init()
    {
        Router::init();
        self::userInit();

        $controller = ['app\\controllers\\' . ucfirst(Router::getLayout()) . 'Controller', Router::getCurrentPage() . 'Action'];

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

    private static function userInit() {
        if (isset($_SESSION['auth_secret'])) {
            $auth = new Auth();
            $auth->loadBySecret($_SESSION['auth_secret']);
            if (Router::isParamExist('p_logout')) {
                $auth->clear();
                header('Location: /');
            }
            if ($auth) {
                if ($auth->verifyAgent($_SERVER['HTTP_USER_AGENT'])) {
                    self::$user = new User($auth->u_id);
                } else {
                    $auth->clear();
                }
            }
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