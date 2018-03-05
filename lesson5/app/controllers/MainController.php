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
use app\classes\Settings;

class MainController extends Controller
{

    public static function indexAction()
    {
        Settings::set('featured_items', Good::getAll('SELECT * FROM `goods` ORDER BY `visits` DESC LIMIT 8'));
        self::render();
    }

    public static function goodAction()
    {
        $good = new Good(Settings::get('id'));
        $good->incVisits();
        Settings::set('good', $good);
        self::render();
    }

    public static function goodsAction()
    {
        self::appendJsFiles('/js/products.js');
        Settings::set('goods', Good::getAll());
        self::render();
    }

    public static function profileAction()
    {
        self::render();
    }

    public static function signupAction()
    {
        self::render();
    }

    public static function checkoutAction()
    {
        self::render();
    }

    public static function shopping_cartAction()
    {
        self::render();
    }

}