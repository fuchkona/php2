<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 11:48
 */

namespace app\controllers;


use app\components\interfaces\RendererInterface;
use app\models\Auth;
use app\models\User;

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

    public function actionSignup()
    {
        if (isset($_POST['signup'])) {
            $user = new User();
            $user->name = $_POST['name'];
            $user->login = $_POST['login'];
            $user->password = $_POST['password'];
            if ($user->save()) {
                header('Location: /');
                exit;
            }
        }
        $this->render();
    }

    public function actionProfile()
    {
        $auths = Auth::getAll();
        $this->render([
            'auths' => $auths
        ]);
    }

    public function actionGoods()
    {
        $this->render();
    }

    public function actionGood()
    {
        $this->render();
    }

    public function actionCheckout()
    {
        $this->render();
    }

    public function actionShopping_cart()
    {
        $this->render();
    }

}