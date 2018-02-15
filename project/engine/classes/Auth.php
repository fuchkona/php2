<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.02.2018
 * Time: 18:28
 */

namespace engine\classes;


class Auth
{
    private $a_id;
    private $u_id;
    private $secret;
    private $time;
    private $agent;

    public function __construct($id = null)
    {
        $this->a_id = $id;
        $this->load();
    }

    private function load($sql = null)
    {
        if (is_null($sql) && !is_null($this->a_id) && is_numeric($this->a_id)) {
            $sql = "SELECT * FROM `auth` WHERE `a_id` = " . DB::esc($this->a_id);
        }
        if ($sql && $row = DB::getRow($sql)) {
            $this->a_id = $row['a_id'];
            $this->u_id = $row['u_id'];
            $this->secret = $row['secret'];
            $this->time = $row['time'];
            $this->agent = $row['agent'];
            return true;
        } else {
            $this->a_id = null;
            return false;
        }
    }

    public function load_by_secret($secret)
    {
        if ($secret) {
            return $this->load("SELECT * FROM `auth` WHERE `secret` LIKE '" . DB::esc($secret) . "'");
        }
        return false;
    }

    private function insert()
    {
        if ($this->a_id = DB::insert("INSERT INTO `auth`(`u_id`, `secret`, `agent`) VALUES (" . DB::esc($this->u_id) . ", '" . DB::esc($this->secret) . "', '" . DB::esc($this->agent) . "')")) {
            return true;
        }
        return false;
    }

    public function apply() {
        if ($this->insert()) {
            $_SESSION['auth_secret'] = $this->secret;
        }
    }

    public function delete()
    {
        unset($_SESSION['auth_secret']);
        return DB::delete("DELETE FROM `auth` WHERE `a_id` = " . DB::esc($this->a_id));
    }

    public static function deleteUserSessions($u_id)
    {
        return DB::delete("DELETE FROM `auth` WHERE `u_id` = " . DB::esc($u_id));
    }

    /**
     * @return null
     */
    public function getAId()
    {
        return $this->a_id;
    }

    /**
     * @param null $a_id
     */
    public function setAId($a_id)
    {
        $this->a_id = $a_id;
    }

    /**
     * @return mixed
     */
    public function getUId()
    {
        return $this->u_id;
    }

    /**
     * @param mixed $u_id
     */
    public function setUId($u_id)
    {
        $this->u_id = $u_id;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param mixed $secret
     */
    public function setSecret($secret)
    {
        $this->secret = password_hash($secret, PASSWORD_DEFAULT);
    }

    public function validateSecret($secret)
    {
        return password_verify($secret, $this->secret);
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * @param mixed $agent
     */
    public function setAgent($agent)
    {
        $this->agent = password_hash($agent, PASSWORD_DEFAULT);
    }

    public function verifyAgent($agent)
    {
        return password_verify($agent, $this->agent);
    }

}