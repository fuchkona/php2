<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 22.02.2018
 * Time: 21:23
 */

namespace app\controllers;

use app\classes\Router;
use app\classes\Twig;
use Twig_Environment;
use Twig_Loader_Filesystem;

abstract class Controller
{
    private static $css_files = [
        '/css/bootstrap-reboot.min',
        '/css/bootstrap.min.css',
        '/css/bootstrap-grid.min.css',
        '/css/fontawesome-all.min.css',
        '/css/main.css'
    ];
    private static $js_files = [
        '/js/jquery-3.3.1.min.js',
        '/js/bootstrap.min.js',
        '/js/bootstrap.bundle.min.js',
        '/js/fontawesome.min.js',
        '/js/main.js'
    ];

    public static function render()
    {
        Router::setParam('css_files', self::$css_files);
        Router::setParam('js_files', self::$js_files);
        Twig::render();
    }

    public static function error404()
    {
        self::error(404, 'Sorry. Page not found!');
    }

    public static function error($id, $title, $msg = null)
    {
        Router::setLayout('main');
        Router::setCurrentPage('error');
        Router::setParam('id', $id);
        Router::setParam('title', $title);
        Router::setParam('msg', $msg);
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