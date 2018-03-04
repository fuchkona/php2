<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 02.03.2018
 * Time: 16:59
 */

namespace app\components\traits;


trait SingletonTrait
{
    private static $instance = null;
    private function __clone() {}
    private function __wakeup() {}
    final private function __construct() {}

}