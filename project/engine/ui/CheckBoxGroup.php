<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 12.02.2018
 * Time: 16:57
 */

namespace engine\ui;


class CheckBoxGroup
{
    /**
     * @param $data - array of objects [ 'object' => object, 'children' => [ same ] ]
     * @param $name - name of check box group
     * @param null $needle - array of checked items [1,2,3]
     */
    public static function render($data, $name, $needle = null)
    {
        echo "<ul>";
        foreach ($data as $row) {
            $object = $row['object'];
            $checked = $needle ? (in_array($object['id'], $needle) ? "checked='checked'" : null) : null;
            echo "<li><label><input " . $checked . " type='checkbox' name='{$name}[]' value='{$object['id']}'>{$object['name']}</label>";
            self::render($row['children'], $name, $needle);
            echo "</li>";
        }
        echo "</ul>";
    }

}