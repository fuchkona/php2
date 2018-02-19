<?php

namespace traits;

trait Singleton
{
    protected static $instance;

    final public static function getInstance() {
        return isset(static::$instance) ? static::$instance : static::$instance = new static();
    }

    final private function __construct()
    {
        $this->init();
    }

    protected abstract function init();

    final private function __sleep()
    {
    }

    final private function __wakeup()
    {
    }

    final private function __clone()
    {
    }


}