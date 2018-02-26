<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 22.02.2018
 * Time: 21:05
 */

namespace app\controllers;

use app\classes\DB;
use app\classes\Router;

class MainController extends Controller
{

    public static function indexAction() {
        Router::setParam('goods', DB::getRows("SELECT * FROM `goods`"));
        self::render();
    }

    public static function imageAction() {
        self::render();
    }

}