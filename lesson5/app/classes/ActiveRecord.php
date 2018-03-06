<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 02.03.2018
 * Time: 15:26
 */

namespace app\classes;


abstract class ActiveRecord
{

    protected static $tableName;

    public function __construct(int $id = null)
    {
        $this->id = $id;
        $this->load();
    }

    public function load()
    {
        if ($this->id) {
            $this->loadBy("`id`=?", [$this->id]);
        }
    }

    public function loadBy(string $where, array $values) {
        $data = DB::getRow(self::getSQL() . " WHERE {$where};", $values);
        if ($data && count($data)) {
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
        }
    }



    public function deleteFromDB()
    {
        if ($this->id) {
            return DB::delete("DELETE FROM `" . self::getTableName() . "` WHERE `id`=?", [$this->id]);
        }
        return false;
    }

    public static function getAll($sql = null, $params = [])
    {
        $array = [];
        $data = DB::getRows($sql ? $sql : self::getSQL(), $params);
        if ($data && count($data)) {
            foreach ($data as $row) {
                $item = new static();
                foreach ($row as $key => $value) {
                    $item->$key = $value;
                }
                $array[] = $item;
            }
        }
        return $array;
    }

    private static function getTableName()
    {
        return end(explode('\\', static::class)) . 's';
    }

    private static function getSQL()
    {
        return "SELECT * FROM `" . self::getTableName() . "` ";
    }
}