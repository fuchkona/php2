<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 10:43
 */

namespace app\classes;


use app\components\renders\TwigRender;
use app\components\traits\SingletonTrait;
use app\controllers\Controller;
use app\controllers\MainController;

class App
{
    use SingletonTrait;

    protected function init()
    {
        $router = new Router();
        $controllerClass = 'app\\controllers\\' . $router->getLayout() . 'Controller';
        $action = 'action' . $router->getAction();
        $settings = new Settings($router->getSettingsUri());
        $settings->set('app_user', AppUser::getInstance()->getUser());
        /** @var Controller $controller */
        $controller = new $controllerClass(
            new TwigRender($router->getLayout(), $router->getAction()),
            $settings
        );
        try {
            call_user_func([$controller, $action]);
        } catch (\Exception $e) {
            $controller->error($e->getCode(), $e->getMessage());
        }
    }

}