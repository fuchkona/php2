<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 22.02.2018
 * Time: 21:05
 */

namespace app\controllers;

use app\classes\ar\Auth;
use app\classes\ar\User;
use app\classes\DB;
use app\classes\ar\Good;
use app\classes\Router;

class MainController extends Controller
{

    public static function indexAction() {
        Controller::appendJsFiles('/js/ajax/load_extra_goods.js');
        Router::setParam('goods', Good::getAll("SELECT * FROM `goods` LIMIT 4;"));
        self::render();
    }

    public static function goodAction() {
        Router::setParam('good', new Good(Router::getParam('id')));
        self::render();
    }

    public static function goodsAction() {
        Router::setParam('goods', Good::getAll());
        self::render();
    }

    public static function profileAction() {
        self::render();
    }

    public static function signinAction() {
        if (Router::isParamExist('p_signin')) {
            $user = new User();
            $user->loadByLogin(Router::getParam('p_login'));
            if ($user && $user->verifyPassword(Router::getParam('p_password'))) {
                $auth = new Auth();
                $auth->setUId($user->getId());
                $auth->generateSecret();
                $auth->setAgent($_SERVER['HTTP_USER_AGENT']);
                $auth->apply();
                header('Location: /');
                exit;
            }
        }
        self::render();
    }

    public static function signupAction() {
        if (Router::isParamExist('p_signup')) {
            $user = new User();
            $user->setName(Router::getParam('p_name'));
            $user->setLogin(Router::getParam('p_login'));
            $user->setPassword(Router::getParam('p_password'));
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
        self::render();
    }

}