<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 04.03.2018
 * Time: 11:54
 */

namespace app\classes;


use app\classes\ar\Auth;
use app\classes\ar\User;
use app\components\traits\SingletonTrait;

class AppUser
{
    use SingletonTrait;

    private static $user;

    public static function init() {
        self::initNewUser();
        self::initLoggingUser();
        return self::getUser();
    }

    public static function getUser() {
        if(empty(self::$user)) {
            if (isset($_SESSION['auth_secret'])) {
                $auth = new Auth();
                $auth->loadBySecret($_SESSION['auth_secret']);
                if (Settings::isExist('p_logout')) {
                    $auth->clear();
                    header('Location: /');
                    exit;
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
        return self::$user;
    }

    private static function initNewUser()
    {
        if (Settings::isExist('p_signup')) {
            $user = new User();
            $user->setName(Settings::get('p_name'));
            $user->setLogin(Settings::get('p_login'));
            $user->setPassword(Settings::get('p_password'));
            if ($user->addToDB()) {
                $auth = new Auth();
                $auth->setUId($user->getId());
                $auth->generateSecret();
                $auth->setAgent($_SERVER['HTTP_USER_AGENT']);
                $auth->apply();
                header('Location: /');
                exit;
            }
        }
    }

    private static function initLoggingUser()
    {
        if (Settings::isExist('p_signin')) {
            $user = new User();
            $user->loadByLogin(Settings::get('p_login'));
            if ($user && $user->verifyPassword(Settings::get('p_password'))) {
                $auth = new Auth();
                $auth->setUId($user->getId());
                $auth->generateSecret();
                $auth->setAgent($_SERVER['HTTP_USER_AGENT']);
                $auth->apply();
                header('Location: /');
                exit;
            }
        }
    }
}