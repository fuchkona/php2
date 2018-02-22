<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 22.02.2018
 * Time: 21:05
 */

namespace app\controllers;

class MainController extends Controller
{

    public static function indexAction() {
        self::render();
    }

    public static function imageAction() {
        self::render();
    }

}