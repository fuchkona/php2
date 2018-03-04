<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 22.02.2018
 * Time: 21:20
 */

namespace app\classes;

use Twig_Environment;
use Twig_Loader_Filesystem;

class Twig
{

    public static function render() {
        $loader = new Twig_Loader_Filesystem(HOME . '/templates');

        $twig = new Twig_Environment($loader);

        $template = $twig->load(Router::getLayout() .'.tmpl');

        Settings::set('page', Router::getCurrentPage());

        echo $template->render(array_merge(Settings::getSettings(), ['authorized_user' => App::getUser()]));
    }

}