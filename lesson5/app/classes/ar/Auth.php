<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 02.03.2018
 * Time: 17:40
 */

namespace app\classes\ar;


use app\classes\ActiveRecord;
use app\classes\DB;

class Auth extends ActiveRecord
{
    public $u_id;
    public $secret;
    public $agent;

    public function loadByUserId($u_id)
    {
        $this->loadBy("`u_id` = ?", [$u_id]);
    }

    public function loadBySecret($secret)
    {
        $this->loadBy("`secret` LIKE ?", [$secret]);
    }

    public function addToDB()
    {
        return $this->id = DB::insert("INSERT INTO `auths`(`u_id`,`secret`,`agent`) VALUES (?, ?, ?)", [$this->u_id, $this->secret, $this->agent]);
    }

    public function apply()
    {
        if ($this->addToDB()) {
            $_SESSION['auth_secret'] = $this->secret;
        }
    }


    public function clear()
    {
        unset($_SESSION['auth_secret']);
        $this->deleteFromDB();
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

    public function verifySecret($secret)
    {
        return password_verify($secret, $this->secret);
    }

    /**
     * @param mixed $secret
     */
    public function setSecret($secret)
    {
        $this->secret = password_hash($secret, PASSWORD_DEFAULT);
    }

    public function generateSecret()
    {
        $this->setSecret($this->u_id . time() . rand(0, 10000000));
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