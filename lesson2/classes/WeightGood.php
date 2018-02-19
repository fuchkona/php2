<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 19.02.2018
 * Time: 19:09
 */

namespace classes;


class WeightGood extends Good
{
    private $price;
    private $quantity;

    /**
     * WeightGood constructor.
     * @param float $price
     * @param float $quantity in KG
     */
    public function __construct(float $price = 0, float $quantity = 1)
    {
        $this->price = $price;
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getCost() : float
    {
        return number_format(ceil($this->price * $this->quantity * 100) / 100, 2, '.', ' ');
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity in KG
     */
    public function setQuantity(float $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param int $quantity
     */
    public function incCount(int $quantity = 1)
    {
        $this->quantity += $quantity;
    }

}