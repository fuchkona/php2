<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 02.03.2018
 * Time: 16:56
 */

namespace app\classes\ar;


use app\classes\ActiveRecord;
use app\classes\DB;

class User extends ActiveRecord
{
    public $id;
    public $name;
    public $login;
    public $password;
    public $role;

    public function loadByLogin($login)
    {
        $this->loadBy("`login` LIKE ?", [$login]);
    }

    public function addToDB()
    {
        return $this->id = DB::insert("INSERT INTO `users`(`login`,`password`,`name`) VALUES (?, ?, ?)", [$this->login, $this->password, $this->name]);
    }

    public function saveToDb()
    {
        return DB::update("UPDATE `users` SET `name`=? WHERE `id`=?", [$this->name]);
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
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     * @return bool
     */
    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function isUser()
    {
        return $this->role == 0 || $this->isAdmin();
    }

    public function isAdmin()
    {
        return $this->role == 255;
    }

}