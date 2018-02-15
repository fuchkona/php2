<?php

/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 15.02.2018
 * Time: 10:56
 */

namespace classes;

class Good
{
    private $id;
    private $title;
    private $description;
    private $price;

    /**
     * Good constructor.
     * @param $id
     */
    public function __construct($id = null)
    {
        $this->setId($id);
        $this->load();
    }

    /**
     * Loading from DB
     */
    private function load() {
        if (!is_null($this->id)) {
            // Some magic here
        }
    }

    /**
     * Saving to DB
     */
    public function save() {
        if (!is_null($this->id)) {
            // Save to DB
        } else {
            // Add to DB
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = is_numeric($id) ? $id : $this->id;
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
        $this->price = is_numeric($price) ? $price : $this->price;
    }



}