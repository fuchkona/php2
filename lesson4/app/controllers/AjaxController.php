<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 27.02.2018
 * Time: 11:27
 */

namespace app\controllers;

use app\classes\Router;
use app\classes\DB;

class AjaxController extends Controller
{
    public static function getGoodsAction()
    {
        $position = $_POST['position'];
        $count = $_POST['count'];

        if ($count && is_numeric($count)) {
            try {
                echo json_encode(DB::getRows("SELECT * FROM `goods` LIMIT " . ($position ? $position : 0) . ",{$count}"));
            } catch (\Exception $e) {
                echo $e->getCode() . ' - ' . $e->getMessage();
            }
        } else {
            echo 'error';
        }
    }
}