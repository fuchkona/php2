<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.02.2018
 * Time: 19:26
 */

namespace app\classes;

class Router
{
    private static $current_page;
    private static $params;
    private static $layout = 'main';

    private static $layouts = ['admin'];

    private function __construct()
    {
    }

    public static function init()
    {
        $path = $_SERVER['REQUEST_URI'];
        if ($pos = strpos($path, 'public')) {
            $path = substr($path, $pos + 6);
        }
        $path = explode('/', $path);
        if (in_array($path[1], self::$layouts)) {
            self::$layout = $path[1];
            $path = array_slice($path, 1);
        }
        self::$current_page = $path[1] ? $path[1] : 'index';
        $path = array_slice($path, 1);

        if (count($path) > 1) {
            for ($i = 0; $i < count($path) - 1; $i += 2) {
                self::$params[$path[$i]] = $path[$i + 1];
            }
        }
    }
    /**
     * @return mixed
     */
    public static function getCurrentPage()
    {
        return self::$current_page;
    }

    /**
     * @return string
     */
    public static function getLayout()
    {
        return self::$layout;
    }

    /**
     * @return mixed
     */
    public static function getParams()
    {
        return self::$params;
    }

}