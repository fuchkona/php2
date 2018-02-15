<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 12.02.2018
 * Time: 17:41
 */

namespace engine\classes;


class GoodsCategories
{
    private $gc_id;
    private $g_id;
    private $c_id;

    public function __construct($gc_id = null)
    {
        $this->gc_id = $gc_id;
        $this->load();
    }

    public function load()
    {
        if ($this->gc_id && is_numeric($this->gc_id)) {
            if ($row = DB::getRow("SELECT * FROM `goodsCategory` WHERE `gc_id` = " . $this->gc_id)) {
                $this->c_id = $row['c_id'];
                $this->g_id = $row['g_id'];
            }
        }
    }

    public static function getGoodCategories($g_id)
    {
        $gcs = [];
        foreach (DB::getRows("SELECT * FROM `goodsCategory` WHERE `g_id` = " . $g_id) as $row) {
            $gcs[] = new GoodsCategories($row['gc_id']);
        }
        return $gcs;
    }

    public static function getCategoryGoods($c_id)
    {
        $gcs = [];
        foreach (DB::getRows("SELECT * FROM `goodsCategory` WHERE `c_id` = " . $c_id) as $row) {
            $gcs[] = new GoodsCategories($row['gc_id']);
        }
        return $gcs;
    }

    public function save()
    {
        if ($this->gc_id) {
            return DB::update("UPDATE `goodsCategory` SET `g_id` = " . DB::esc($this->g_id) . ", `c_id` = " . DB::esc($this->c_id) . " WHERE `gc_id` = " . DB::esc($this->gc_id));
        } else {
            return $this->gc_id = DB::insert("INSERT INTO `goodsCategory`(`g_id`, `c_id`) VALUES(" . DB::esc($this->g_id) . ", " . DB::esc($this->c_id) . ")");
        }
    }

    public function delete()
    {
        return DB::delete("DELETE FROM `goodsCategory` WHERE `gc_id` = " . DB::esc($this->gc_id));
    }

    public static function deleteGoodCategories($g_id)
    {
        return DB::delete("DELETE FROM `goodsCategory` WHERE `g_id` = " . DB::esc($g_id));
    }

    public static function deleteCategoryGoods($c_id)
    {
        return DB::delete("DELETE FROM `goodsCategory` WHERE `c_id` = " . DB::esc($c_id));
    }

    /**
     * @return mixed
     */
    public function getGcId()
    {
        return $this->gc_id;
    }

    /**
     * @param mixed $gc_id
     */
    public function setGcId($gc_id)
    {
        $this->gc_id = $gc_id;
    }

    /**
     * @return mixed
     */
    public function getGId()
    {
        return $this->g_id;
    }

    /**
     * @param mixed $g_id
     */
    public function setGId($g_id)
    {
        $this->g_id = $g_id;
    }

    /**
     * @return mixed
     */
    public function getCId()
    {
        return $this->c_id;
    }

    /**
     * @param mixed $c_id
     */
    public function setCId($c_id)
    {
        $this->c_id = $c_id;
    }

}