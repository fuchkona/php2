<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 12.03.2018
 * Time: 15:25
 */

namespace app\classes;


use app\components\traits\SingletonTrait;
use app\models\Auth;
use app\models\User;

class AppUser
{
    use SingletonTrait;

    protected $user;

    protected function init()
    {
        $this->checkSignIn();
        $this->checkCookie();
        $this->checkSession();
        $this->checkSignOut();
    }

    private function checkSignIn()
    {
        if (isset($_POST['signin'])) {
            $user = new User();
            $user->login = $_POST['login'];
            $user->loadByLogin();
            if ($user->verifyPassword($_POST['password'])) {
                $this->user = $user;
                $auth = new Auth();
                $auth->u_id = $user->id;
                $auth->generateSecret();
                $auth->setAgent($_SERVER['HTTP_USER_AGENT']);
                if ($auth->save()) {
                    $_SESSION['nikmarket_user_secret'] = $auth->getSecret();
                    if ($_POST['remember-me']) {
                        setcookie('nikmarket_user_secret', $auth->getSecret(), time() + 25200, '/', $_SERVER['SERVER_NAME']);
                    }
                }
            }
        }
    }

    private function checkCookie()
    {
        if (isset($_COOKIE['nikmarket_user_secret'])) {
            $_SESSION['nikmarket_user_secret'] = $_COOKIE['nikmarket_user_secret'];
        }
    }

    private function checkSession()
    {
        if (isset($_SESSION['nikmarket_user_secret'])) {
            $auth = new Auth();
            $auth->loadBy('`secret` = ?', [$_SESSION['nikmarket_user_secret']]);
            $this->user = new User($auth->u_id);
        }
    }

    private function checkSignOut()
    {
        if (isset($_POST['logout'])) {
            $auth = new Auth();
            $auth->loadBy('`secret` = ?', [$_SESSION['nikmarket_user_secret']]);
            $auth->remove();
            unset($_SESSION['nikmarket_user_secret']);
            setcookie('nikmarket_user_secret', '', time() - 25200, '/', $_SERVER['SERVER_NAME']);
            $this->user = null;
        }
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }



}