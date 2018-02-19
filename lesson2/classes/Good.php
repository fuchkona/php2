<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 19.02.2018
 * Time: 14:45
 */

namespace classes;


abstract class Good
{

    /**
     * @return float
     */
    public abstract function getCost() : float ;

    public abstract function incCount(int $quantity = 1);

}