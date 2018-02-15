<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.02.2018
 * Time: 19:26
 */

namespace engine\classes;

class Router
{
    private static $current_page;
    private static $params;
    public static $layout = 'main';

    private function __construct()
    {
    }

    public static function init()
    {
        $path = explode('/', $_SERVER['REQUEST_URI']);
        self::$current_page = $path[1] ? $path[1] : 'index';
        switch (self::$current_page) {
            case 'admin':
                self::$layout = self::$current_page;
                self::$current_page = $path[2] ? $path[2] : 'index';
                $params = array_slice($path, 3);
                break;
            default:
                $params = array_slice($path, 2);
                break;
        }
        if (count($params) > 1) {
            for ($i = 0; $i < count($params) - 1; $i += 2) {
                self::$params[$params[$i]] = $params[$i + 1];
            }
        }
        if (!file_exists(self::getFullPathToCurrentPage())) {
            self::$current_page = null;
        }
    }

    public static function initAction()
    {
        require_once HOME . "/engine/actions/" . self::$layout . ".php";
    }

    public static function renderPage()
    {
        require_once HOME . "/ui/layouts/" . self::$layout . ".php";
    }

    public static function getFullPathToCurrentPage()
    {
        return HOME . '/ui/pages/' . self::$layout . '/' . Router::getCurrentPage() . '.php';
    }

    /**
     * @return mixed
     */
    public static function getCurrentPage()
    {
        return self::$current_page;
    }

    /**
     * @param mixed $current_page
     */
    public static function setCurrentPage($current_page)
    {
        self::$current_page = $current_page;
    }

    public static function getParam($key)
    {
        if (isset(self::$params[$key]) && self::$params[$key]) {
            return self::$params[$key];
        }
        return null;
    }

}