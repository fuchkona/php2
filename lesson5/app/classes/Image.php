<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 05.03.2018
 * Time: 13:18
 */

namespace app\classes;


class Image
{

    public $file;
    public $outFolder = HOME . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'dproducts';

    /**
     * image constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    public function save()
    {
        if (count($this->file)) {
            $outName = md5($this->file['name']) . time() . '.' . end(explode('.', $this->file['name']));
            move_uploaded_file($this->file['tmp_name'], $this->outFolder . DIRECTORY_SEPARATOR . $outName);
            return $outName;
        }
    }

}