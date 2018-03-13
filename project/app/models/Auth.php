<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 12.03.2018
 * Time: 16:00
 */

namespace app\models;


use app\classes\ActiveRecord;
use app\classes\AppUser;

/**
 * Class Auth
 * @package app\models
 * @property string u_id
 * @property string secret
 * @property string agent
 */
class Auth extends ActiveRecord
{
    protected $secret;
    protected $agent;

    protected $fields = [
        'u_id' => 'int',
        'secret' => 'string',
        'agent' => 'string',
    ];

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    public function generateSecret()
    {
        $this->secret = password_hash(time() . '♥' . $this->u_id, PASSWORD_DEFAULT);
    }

    public function verifySecret(string $secret)
    {
        return password_verify($secret, $this->secret);
    }

    /**
     * @return string
     */
    public function getAgent(): string
    {
        return $this->agent;
    }

    /**
     * @param string $agent
     */
    public function setAgent(string $agent)
    {
        $this->agent = password_hash($agent, PASSWORD_DEFAULT);
    }

    public function verifyAgent(string $agent)
    {
        return password_verify($agent, $this->agent);
    }

    public function isCurrent()
    {
        return $this->verifyAgent($_SERVER['HTTP_USER_AGENT']);
    }

}