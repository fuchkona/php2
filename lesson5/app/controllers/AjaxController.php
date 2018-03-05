<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 27.02.2018
 * Time: 11:27
 */

namespace app\controllers;

use app\classes\ar\Good;
use app\classes\Router;
use app\classes\DB;
use app\classes\Settings;

class AjaxController extends Controller
{
    public static function get_goodsAction()
    {
        $position = Settings::get('p_position');
        $count = Settings::get('p_count');

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

    public static function admin_delete_goodAction()
    {
        self::mustBeAdmin();
        if ($id = Settings::get('p_id')) {
            $good = new Good($id);
            if ($good->deleteFromDB()) {
                echo 'Good was deleted!';
            }
        } else {
            echo 'error';
        }
    }
}