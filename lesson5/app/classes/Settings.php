<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 04.03.2018
 * Time: 12:37
 */

namespace app\classes;


use app\components\traits\SingletonTrait;

class Settings
{
    use SingletonTrait;

    private static $settings = [];

    public static function init($settings)
    {
        if (count($settings) > 1) {
            for ($i = 0; $i < count($settings) - 1; $i += 2) {
                self::$settings[$settings[$i]] = $settings[$i + 1];
            }
        }

        foreach ($_POST as $key => $value) {
            self::$settings['p_' . $key] = $value;
        }
    }

    public static function set($key, $value)
    {
        self::$settings[$key] = $value;
    }

    public static function clear()
    {
        self::$settings = [];
    }

    /**
     * @return array
     */
    public static function getSettings()
    {
        return self::$settings;
    }

    public static function get($key)
    {
        return self::isExist($key) ? self::$settings[$key] : null;
    }

    public static function isExist($key)
    {
        return array_key_exists($key, self::$settings);
    }
}