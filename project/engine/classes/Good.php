<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 06.02.2018
 * Time: 14:14
 */

namespace engine\classes;


class Good
{

    private $g_id;
    private $title;
    private $description;
    private $price;
    private $visits;
    private $photo;

    public function __construct($id = null)
    {
        $this->g_id = $id;
        $this->load();
    }

    public function load()
    {
        if (!is_null($this->g_id) && is_numeric($this->g_id)) {
            if ($row = DB::getRow("SELECT * FROM `goods` WHERE `g_id` = " . DB::esc($this->g_id))) {
                $this->title = $row['title'];
                $this->description = $row['description'];
                $this->price = $row['price'];
                $this->visits = $row['visits'];
                $this->photo = $row['photo'];
            } else {
                $this->g_id = null;
            }
        }
    }

    public function save()
    {
        if (!is_null($this->g_id) && is_numeric($this->g_id)) {
            return DB::update("UPDATE `goods` SET `title` = '" . DB::esc($this->title) . "', `description` = '" . DB::esc($this->description) . "', `price` = " . DB::esc($this->price) . ", `photo` = '" . DB::esc($this->photo) . "' WHERE `g_id` = " . DB::esc($this->g_id));
        } else {
            return $this->g_id = DB::insert("INSERT INTO `goods`(`title`, `description`, `price`, `photo`) VALUES ('" . DB::esc($this->title) . "', '" . DB::esc($this->description) . "', " . DB::esc($this->price) . ", '" . DB::esc($this->photo) . "');");
        }
    }

    public function delete()
    {
        GoodsCategories::deleteGoodCategories($this->g_id);
        DB::delete("DELETE FROM `goods` WHERE `g_id` = " . DB::esc($this->g_id));
    }

    public static function getAll()
    {
        $goods = [];
        foreach (DB::getRows("SELECT * FROM `goods`;") as $db_good) {
            $goods[] = new Good($db_good['g_id']);
        }
        return $goods;
    }

    public static function getTopGoods($count)
    {
        $goods = [];
        foreach (DB::getRows("SELECT * FROM `goods` ORDER BY `visits` DESC LIMIT {$count};") as $db_good) {
            $goods[] = new Good($db_good['g_id']);
        }
        return $goods;
    }

    public function getCategories()
    {
        $categories = [];
        /** @var GoodsCategories $goodCategory */
        foreach (GoodsCategories::getGoodCategories($this->g_id) as $goodCategory) {
            $categories[] = new Category($goodCategory->getCId());
        }
        return $categories;
    }

    public function getCategoriesId()
    {
        $ids = [];
        /** @var Category $category */
        foreach ($this->getCategories() as $category) {
            $ids[] = $category->getCId();
        }
        return $ids;
    }

    public function getCategoriesTitle()
    {
        $titles = [];
        /** @var Category $category */
        foreach ($this->getCategories() as $category) {
            $titles[] = $category->getTitle();
        }
        return $titles;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->g_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->g_id = $id;
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

    /**
     * @return mixed
     */
    public function getVisits()
    {
        return $this->visits;
    }

    /**
     * @param mixed $visits
     */
    public function setVisits($visits)
    {
        $this->visits = $visits;
    }

    public function incVisits()
    {
        if ($this->g_id) {
            $this->visits++;
            $this->save();
        }
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        if ($this->photo) {
            unlink(HOME . '/public/images/dproducts/' . $this->photo);
        }
        $this->photo = $photo;
    }

}