<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 12.02.2018
 * Time: 16:57
 */

namespace engine\ui;


class ListUl
{
    /**
     * @param $data - array of objects [ 'object' => object, 'children' => [ same ] ]
     * @param null $needle - array of checked items [1,2,3]
     */
    public static function render($data, $needle = null)
    {
        echo "<ul>";
        foreach ($data as $row) {
            $object = $row['object'];
            if ($needle && in_array($object['id'], $needle)) {
                echo "<li>{$object['name']}";
            }
            self::render($row['children'], $needle);
            echo "</li>";
        }
        echo "</ul>";
    }

}