<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 10:59
 */

namespace app\classes;


class Router
{
    protected $layout;
    protected $action;
    protected $settings_uri;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $request = explode('/', $_SERVER['REQUEST_URI']);
        $offset = 2;
        $this->layout = ucfirst($request[1]);
        if (empty($this->layout) || !file_exists(HOME . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $this->layout . 'Controller.php')) {
            $this->layout = 'Main';
            $offset = 1;
        }
        if (!empty($request[$offset])) {
            $this->action = ucfirst($request[$offset]);
        } else {
            $this->action = 'Index';
        }
        $this->settings_uri = array_slice($request, ++$offset);
    }

    /**
     * @return mixed
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param mixed $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return array
     */
    public function getSettingsUri()
    {
        return $this->settings_uri;
    }

}