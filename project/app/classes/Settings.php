<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 11:31
 */

namespace app\classes;


class Settings
{
    private $settings = [];

    /**
     * Settings constructor.
     * @param $settings_uri
     */
    public function __construct(array $settings_uri)
    {
        if (count($settings_uri) > 1) {
            for ($i = 0; $i < count($settings_uri) - 1; $i += 2) {
                $this->settings[$settings_uri[$i]] = $settings_uri[$i + 1];
            }
        }
    }

    public function isExists($key)
    {
        return array_key_exists($key, $this->settings);
    }

    public function get($key)
    {
        return ($this->isExists($key) && $this->settings[$key]) ? $this->settings[$key] : null;
    }

    public function set($key, $value)
    {
        if (!empty($key)) {
            $this->settings[$key] = $value;
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return $this->settings;
    }
}