<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2018
 * Time: 14:11
 */

namespace app\classes;


class ActiveRecord
{

    protected $tableName;
    protected $id;
    protected $fields;


    protected function getTableName()
    {
        return !empty($this->tableName) ? $this->tableName : end(explode('\\', static::class)) . 's';
    }

    private function getSQL()
    {
        return "SELECT * FROM `" . $this->getTableName() . "` ";
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
        if (!$this->id) {
            $questions = "";
            $data = [];
            foreach ($this->fields as $field => $type) {
                if (method_exists($this, $field)) {
                    $data[] = $field;
                    $questions .= '?';
                }
            }
            $this->id = DB::getInstance()->insert(
                "INSERT INTO `{$this->getTableName()}`(" . implode(', ', array_keys($this->fields)) . ") VALUES (" . implode(', ', $questions) . ")",
                $data
            );
        }
        // TODO Update method
    }

    public function getAll($sql = null, $params = [])
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
            return DB::getInstance()->delete("DELETE FROM `{$this->getTableName()}` WHERE `id` = ?", [$this->id]);
        }
        return false;
    }

}