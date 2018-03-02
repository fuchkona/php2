<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 26.02.2018
 * Time: 19:50
 */

namespace app\classes;


class Good
{

    private $id;
    private $title;
    private $description;
    private $price;

    public function __construct(int $id = null)
    {
        $this->id = $id;
        $this->load();
    }

    public function load()
    {
        if ($this->id) {
            $data = DB::getRow("SELECT * FROM `goods` WHERE `id` = ?;", [$this->id]);
            if ($data && count($data)) {
                foreach ($data as $key => $value) {
                    $this->$key = $value;
                }
            }
        }
    }

    public static function getAll($sql = null) {
        $goods = [];
        $data = DB::getRows($sql ? $sql : "SELECT * FROM `goods`;");
        if ($data && count($data)) {
            foreach ($data as $row) {
                $good = new self();
                foreach ($row as $key => $value) {
                    $good->$key = $value;
                }
                $goods[] = $good;
            }
        }
        return $goods;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }



}