<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 11:48
 */

namespace app\controllers;


use app\classes\Settings;
use app\components\interfaces\RendererInterface;
use app\components\renders\TwigRender;

abstract class Controller
{
    private $renderer;
    protected $settings;
    protected $css_files;
    protected $js_files;

    /**
     * Controller constructor.
     * @param RendererInterface $renderer
     * @param $settings
     */
    public function __construct(RendererInterface $renderer, Settings $settings)
    {
        $this->renderer = $renderer;
        $this->settings = $settings;
        $this->settings->set('css_files', $this->css_files);
        $this->settings->set('js_files', $this->js_files);
    }

    protected function render(array $extraProperties = [])
    {
        if ($this->checkAccess()) {
            $this->renderer->render(array_merge($this->settings->getAll(), $extraProperties));
        } else {
            throw new \Exception('You don\'t have enough permissions to visit this page!', 666);
        }
    }

    protected function checkAccess()
    {
        return true;
    }

    public function error(int $code, $message)
    {
        $this->settings->set('id', $code);
        $this->settings->set('msg', $message);
        $this->renderer->setPage('error');
        $this->renderer->render($this->settings->getAll());

    }

    function __call($name, $arguments)
    {
        $this->error(404, 'Page not found');
    }

}