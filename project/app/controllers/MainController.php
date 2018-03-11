<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 11:48
 */

namespace app\controllers;


use app\components\interfaces\RendererInterface;

class MainController extends Controller
{
    protected $css_files = [
        '/css/normalize.css',
        '/css/main_new.css',
        '/css/font-awesome.min.css',
        '/css/nouislider.min.css',
    ];

    protected $js_files= [
        '/js/jquery-3.2.1.min.js',
        '/js/nouislider.min.js',
        '/js/main.js',
        '/js/classes/Container.js',
        '/js/classes/Cart.js'
    ];

    public function actionIndex()
    {
        $this->render();
    }

    public function actionGoods()
    {
        $this->render();
    }

}