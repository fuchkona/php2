<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 13:55
 */

namespace app\classes;


use app\components\traits\SingletonTrait;
use PDO;

class DB
{
use SingletonTrait;

    private $host = '127.0.0.1';
    private $dbname = 'nikmarket';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8';

    /** @var  PDO */
    protected $db;

    protected function init()
    {
        $this->db = new PDO(
            "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=" . $this->charset,
            $this->user,
            $this->pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
    }

    private function execute($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function getRows($sql, $params = [])
    {
        return $this->execute($sql, $params)->fetchAll();
    }

    public function getRow($sql, $params = [])
    {
        return $this->execute($sql, $params)->fetch();
    }

    public function insert($sql, $params = [])
    {
        $this->execute($sql, $params);
        return $this->db->lastInsertId();
    }

    public function update($sql, $params = [])
    {
        return $this->execute($sql, $params)->rowCount();
    }

    public function delete($sql, $params = [])
    {
        return $this->execute($sql, $params)->rowCount();
    }

}