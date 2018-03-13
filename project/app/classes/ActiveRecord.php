<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 14:11
 */

namespace app\classes;


use ReflectionMethod;

/**
 * Class ActiveRecord
 * @package app\classes
 * @property int id
 */
class ActiveRecord
{

    protected static $tableName;
    protected $id;
    protected $fields;

    /**
     * ActiveRecord constructor.
     * @param $id
     */
    public function __construct($id = null)
    {
        $this->id = $id;
        $this->load();
    }

    function __set($name, $value)
    {
        $setter = 'set' . ucfirst($name);
        if (method_exists($this, $setter)) {
            $this->$setter($value);
            return $this;
        }
        if (property_exists($this, $name)) {
            $reflection = new ReflectionMethod($this, $name);
            if ($reflection->isPrivate()) {
                throw new \Exception('Private property');
            }
        }
        $this->$name = $value;
        return $this;
    }

    function __get($name)
    {
        $getter = 'get' . ucfirst($name);
        if (method_exists($this, $getter)) {
            return $this->$getter();
        }
        if (property_exists($this, $name)) {
            $reflection = new ReflectionMethod($this, $name);
            if ($reflection->isPublic()) {
                return $this->$name;
            }
        }
        return null;
    }


    protected static function getTableName()
    {
        return !empty(self::$tableName) ? self::$tableName : end(explode('\\', static::class)) . 's';
    }

    private function getSQL()
    {
        return "SELECT * FROM `" . self::getTableName() . "` ";
    }

    public function load()
    {
        if ($this->id) {
            $this->loadBy("`id`=?", [$this->id]);
        }
    }

    public function loadBy(string $where, array $values)
    {
        $data = DB::getInstance()->getRow($this->getSQL() . " WHERE {$where};", $values);
        if ($data && count($data)) {
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function save()
    {
        $titles = array_keys($this->fields);
        $questions = [];
        $data = [];
        foreach ($titles as $title) {
            $data[] = $this->$title;
            $questions[] = '?';
        }
        if (!$this->id) {
            return $this->id = DB::getInstance()->insert(
                "INSERT INTO `" . self::getTableName() . "`(" . implode(', ', $titles) . ") VALUES (" . implode(', ', $questions) . ")",
                $data
            );
        } elseif (is_numeric($this->id)) {
            $setData = [];
            for ($i = 0; $i < count($titles); $i++) {
                $setData[] = "`{$titles[$i]}` = ?";
            }
            $data[] = $this->id;
            return DB::getInstance()->update(
                "UPDATE `" . self::getTableName() . "` SET " . implode(', ', $setData) . " WHERE `id`= ?",
                $data
            );
        }
    }

    public static function getAll($sql = null, $params = [])
    {
        $array = [];
        $data = DB::getInstance()->getRows($sql ? $sql : self::getSQL(), $params);
        if ($data && count($data)) {
            foreach ($data as $row) {
                $item = new static;
                foreach ($row as $key => $value) {
                    $item->$key = $value;
                }
                $array[] = $item;
            }
        }
        return $array;
    }

    public function remove()
    {
        if (is_numeric($this->id)) {
            return DB::getInstance()->delete("DELETE FROM `" . self::getTableName() . "` WHERE `id` = ?", [$this->id]);
        }
        return false;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

}