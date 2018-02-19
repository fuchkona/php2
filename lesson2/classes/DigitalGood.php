<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 19.02.2018
 * Time: 19:07
 */

namespace classes;


class DigitalGood extends PieceGood
{
    /**
     * @return float
     */
    public function getCost() : float
    {
        return number_format(ceil(parent::getCost() / 2 * 100) / 100, 2, '.', ' ');
    }

}