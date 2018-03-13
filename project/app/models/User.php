<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 12.03.2018
 * Time: 11:18
 */

namespace app\models;


use app\classes\ActiveRecord;

/**
 * @property string login
 * @property string password
 * @property string name
 */
class User extends ActiveRecord
{
    protected $password;
    protected $role;

    protected $fields = [
        'login' => 'string',
        'password' => 'string',
        'name' => 'string',
    ];

    public function loadByLogin()
    {
        $this->loadBy('`login` = ?', [$this->login]);
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword(string $password)
    {
        return password_verify($password, $this->password);
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