<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 06.02.2018
 * Time: 17:06
 */

namespace engine\classes;

class App
{
    /** @var  User */
    private static $user;

    private function __construct()
    {
    }

    public static function init()
    {
        Router::init();
        Router::initAction();
        self::initUser();
        Router::renderPage();
        DB::close();
    }

    private static function initUser()
    {
        $auth = new Auth();
        $auth->load_by_secret($_SESSION['auth_secret']);
        if ($auth->verifyAgent($_SERVER['HTTP_USER_AGENT'])) {
            self::$user = new User($auth->getUId());
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