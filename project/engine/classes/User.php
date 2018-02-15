<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 06.02.2018
 * Time: 15:34
 */

namespace engine\classes;


class User
{
    private $u_id;
    private $login;
    private $name;
    private $pass;
    private $role;

    const ROLE_ADMIN = 255;
    const ROLE_USER = 0;

    /**
     * User constructor.
     * @param $u_id
     */
    public function __construct($u_id = null)
    {
        $this->u_id = $u_id;
        $this->load();
    }

    function load($login = null)
    {
        $sql = null;
        if ($login) {
            $sql = "SELECT * FROM `users` WHERE `login` LIKE '" . DB::esc($login) . "'";
        } elseif (!is_null($this->u_id) && is_numeric($this->u_id)) {
            $sql = "SELECT * FROM `users` WHERE `u_id` = " . DB::esc($this->u_id);
        }
        if ($sql && $row = DB::getRow($sql)) {
            $this->u_id = $row['u_id'];
            $this->login = $row['login'];
            $this->name = $row['name'];
            $this->pass = $row['pass'];
            $this->role = $row['role'];
        } else {
            $this->u_id = null;
        }
    }

    public function save()
    {
        if (!is_null($this->u_id) && is_numeric($this->u_id)) {
            return DB::update("UPDATE `users` SET `login` = '" . DB::esc($this->login) . "', `name` = '" . DB::esc($this->name) . "',`pass` = '" . DB::esc($this->pass) . "', `role` = " . DB::esc($this->role) . " WHERE `u_id` = " . DB::esc($this->u_id));
        } else {
            return $this->u_id = DB::insert("INSERT INTO `users`(`login`,`name`, `pass`) VALUES ('" . DB::esc($this->login) . "', '" . DB::esc($this->name) . "', '" . DB::esc($this->pass) . "');");
        }
    }

    public function delete()
    {
        DB::delete("DELETE FROM `users` WHERE `u_id` = " . DB::esc($this->u_id));
    }

    public static function getAll()
    {
        $users = [];
        foreach (DB::getRows("SELECT * FROM `users`;") as $db_user) {
            $users[] = new User($db_user['u_id']);
        }
        return $users;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->u_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->u_id = $id;
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

    /**
     * @param $pass
     * @return bool
     */
    public function verifyPass($pass)
    {
        return password_verify($pass, $this->pass);
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = password_hash($pass, PASSWORD_DEFAULT);
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        if (App::getUser()->getRole() == 255) {
            $this->role = $role;
        }
    }

    public function isAdmin()
    {
        return $this->role == self::ROLE_ADMIN;
    }

    public function isUser()
    {
        return $this->role == self::ROLE_USER || $this->isAdmin();
    }

}