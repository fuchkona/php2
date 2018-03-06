<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 05.03.2018
 * Time: 13:18
 */

namespace app\classes;


class UploadImage
{

    public $file;
    public $outFolder = HOME . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'dproducts';
    private $fileTypes;

    /**
     * image constructor.
     * @param $file
     * @param $types
     */
    public function __construct($file, array $types = null)
    {
        $this->file = $file;
        $this->fileTypes = count($types) ? $types : ['jpg', 'jpeg', 'png', 'bmp'];
    }

    public function save()
    {
        if ($this->isOk()) {
            $outName = md5($this->file['name']) . time() . '.' . end(explode('.', $this->file['name']));
            move_uploaded_file($this->file['tmp_name'], $this->outFolder . DIRECTORY_SEPARATOR . $outName);
            return $outName;
        }
        return false;
    }

    public function isOk() {
        if (!count($this->file)) return false;
        if (!array_key_exists('name', $this->file)) return false;
        if (!in_array(end(explode('.', $this->file['name'])),$this->fileTypes)) return false;
        return true;
    }

}