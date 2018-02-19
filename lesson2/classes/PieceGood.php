<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 19.02.2018
 * Time: 19:08
 */

namespace classes;


class PieceGood extends Good
{
    private $quantity;
    private $price;

    /**
     * PieceGood constructor.
     * @param int $quantity in pieces
     * @param float $price
     */
    public function __construct(float $price = 0, int $quantity = 1)
    {
        $this->quantity = $quantity;
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getCost() : float
    {
        return number_format(ceil($this->quantity * $this->price * 100) / 100, 2, '.', ' ');
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity in pieces
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
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
     * @param int $quantity
     */
    public function incCount(int $quantity = 1)
    {
        $this->quantity += $quantity;
    }
}