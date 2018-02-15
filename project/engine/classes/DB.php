<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.02.2018
 * Time: 20:30
 */

namespace engine\classes;

class DB
{
    private static $HOST = 'localhost';
    private static $USER = 'root';
    private static $PASS = '';
    private static $DB = 'nikmarket';

    /** @var  \mysqli */
    private static $connection;

    private function __construct()
    {
    }

    public static function insert($sql) {
        self::open();
        self::$connection->query($sql);
        return self::$connection->insert_id;
    }

    public static function delete($sql) {
        return self::update($sql);
    }

    public static function update($sql) {
        self::insert($sql);
        return self::$connection->affected_rows;
    }

    public static function getRows($sql) {
        self::open();
        $result = self::$connection->query($sql);
        $array = [];
        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
        return $array;
    }

    public static function getRow($sql) {
        return self::getRows($sql)[0];
    }

    /**
     * mysqli real_escape_string
     * @param $input
     * @return mixed
     */
    public static function esc($input) {
        self::open();
        $result = self::$connection->real_escape_string($input);
        return $result ? $result : null;
    }

    /**
     * Open DB connection, if closed
     * @return \mysqli
     */
    private static function open() {
        if (self::$connection instanceof \mysqli) {
            return self::$connection;
        }
        return self::$connection = new \mysqli(self::$HOST, self::$USER, self::$PASS, self::$DB);
    }

    /**
     * Close DB connection, if opened
     */
    public static function close() {
        if (self::$connection instanceof \mysqli) {
            self::$connection->close();
            self::$connection = null;
        }
    }
}