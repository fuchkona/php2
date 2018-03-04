<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 22.02.2018
 * Time: 21:23
 */

namespace app\controllers;

use app\classes\Router;
use app\classes\Settings;
use app\classes\Twig;
use Twig_Environment;
use Twig_Loader_Filesystem;

abstract class Controller
{
    protected static $css_files = [
        '/css/normalize.css',
        '/css/main_new.css',
        '/css/font-awesome.min.css',
        '/css/nouislider.min.css',
    ];

    protected static $js_files = [
        '/js/jquery-3.2.1.min.js',
        '/js/nouislider.min.js',
        '/js/main.js',
        '/js/classes/Container.js',
        '/js/classes/Cart.js'
    ];

    public static function render()
    {
        Settings::set('css_files', static::$css_files);
        Settings::set('js_files', static::$js_files);
        Twig::render();
    }

    public static function error404()
    {
        self::error(404, 'Sorry. Page not found!');
    }

    public static function error($id, $title, $msg = null)
    {
        Router::setCurrentPage('error');
        Settings::set('id', $id);
        Settings::set('title', $title);
        Settings::set('msg', $msg);
        self::render();
    }

    /**
     * @return array
     */
    public static function getCssFiles()
    {
        return self::$css_files;
    }

    public static function appendCssFiles(string $href)
    {
        self::$css_files[] = $href;
    }

    /**
     * @return array
     */
    public static function getJsFiles()
    {
        return self::$js_files;
    }

    public static function appendJsFiles(string $src)
    {
        self::$js_files[] = $src;
    }

}