<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 11:50
 */

namespace app\controllers;


use app\classes\App;
use app\classes\AppUser;
use app\components\interfaces\RendererInterface;
use app\models\User;

class AdminController extends Controller
{
    protected $css_files = [
        '/css/normalize.css',
        '/css/main_new.css',
        '/css/font-awesome.min.css',
    ];

    protected $js_files= [
        '/js/jquery-3.2.1.min.js',
        '/js/admin.js',
    ];

    public function actionIndex()
    {
        $this->render();
    }

    protected function checkAccess()
    {
        return AppUser::getInstance()->getUser()->isAdmin();
    }


}