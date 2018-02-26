<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 26.02.2018
 * Time: 16:00
 */

namespace app\classes;

use PDO;

class DB
{
    private static $instance;

    private static $host = '127.0.0.1';
    private static $db = 'php2l4';
    private static $user = 'root';
    private static $pass = '';
    private static $charset = 'utf8';

    private function __construct()
    {
    }

    public static function getInstance()
    {
        return self::$instance instanceof PDO ? self::$instance : self::$instance = new PDO(
            "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset,
            self::$user,
            self::$pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
    }


    private static function execute($sql, $params = [])
    {
        self::getInstance();
        $stmt = self::$instance->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public static function getRows($sql, $params = [])
    {
        return self::execute($sql, $params)->fetchAll();
    }

    public static function getRow($sql, $params = [])
    {
        return self::execute($sql, $params)->fetch();
    }

    public static function insert($sql, $params = [])
    {
        self::execute($sql, $params);
        return self::getInstance()->lastInsertId();
    }

    public static function update($sql, $params = [])
    {
        return self::execute($sql, $params)->rowCount();
    }

    public static function delete($sql, $params = [])
    {
        return self::execute($sql, $params)->rowCount();
    }

}