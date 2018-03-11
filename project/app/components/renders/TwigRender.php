<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 12:25
 */

namespace app\components\renders;

use app\classes\App;
use app\classes\Settings;
use app\components\interfaces\RendererInterface;
use Twig_Environment;
use Twig_Loader_Filesystem;

class TwigRender implements RendererInterface
{
    protected $layout;
    protected $page;

    /**
     * TwigRender constructor.
     * @param $layout
     * @param $page
     */
    public function __construct($layout, $page = 'index')
    {
        $this->layout = strtolower($layout);
        $this->page = strtolower($page);
    }


    public function render($settings) {
        $loader = new Twig_Loader_Filesystem(HOME . '/templates');

        $twig = new Twig_Environment($loader);

        $template = $twig->load($this->layout .'.tmpl');
        $settings['current_page'] = $this->page;
        echo $template->render($settings);
    }

    /**
     * @return string
     */
    public function getLayout(): string
    {
        return $this->layout;
    }

    /**
     * @param string $layout
     */
    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }

    /**
     * @return string
     */
    public function getPage(): string
    {
        return $this->page;
    }

    /**
     * @param string $page
     */
    public function setPage(string $page)
    {
        $this->page = $page;
    }


}