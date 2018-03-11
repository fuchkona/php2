<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 12:34
 */

namespace app\components\interfaces;


interface RendererInterface
{
    public function render($settings);
    public function getLayout(): string;
    public function setLayout(string $layout);
    public function getPage(): string;
    public function setPage(string $page);

}