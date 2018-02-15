<?php
use engine\classes\Category;
use engine\classes\Good;
use engine\classes\GoodsCategories;

if (isset($_POST['category_add'])) {
    $category = new Category();
    $category->setTitle($_POST['title']);
    $category->setParent($_POST['parent']);
    $category->save();
}

if (isset($_POST['category_edit'])) {
    $category = new Category($_POST['c_id']);
    $category->setTitle($_POST['title']);
    $category->setParent($_POST['parent']);
    $category->save();
}

if (isset($_POST['category_remove'])) {
    $category = new Category($_POST['c_id']);
    $category->delete();
}

if (isset($_POST['good_add']) || $_POST['good_edit']) {
    $id = isset($_POST['g_id']) && $_POST['g_id'] ? $_POST['g_id'] : null;
    $good = new Good($id);
    $good->setTitle($_POST['title']);
    $good->setDescription($_POST['description']);
    $good->setPrice($_POST['price']);

    $photo = $_FILES['photo'];
    if ($photo) {
        $types = ['image/gif', 'image/png', 'image/jpeg'];
        $path = HOME . '/public/images/dproducts/' . time() . md5($photo['name']) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
        if (in_array($photo['type'], $types) && $photo['size'] < 3145728) {
            if (move_uploaded_file($photo['tmp_name'], $path)) {
                $good->setPhoto(basename($path));
            }
        }
    }
    $good->save();

    GoodsCategories::deleteGoodCategories($good->getId());
    if ($_POST['categories'] && count($_POST['categories'])) {
        foreach ($_POST['categories'] as $category) {
            $gc = new GoodsCategories();
            $gc->setGId($good->getId());
            $gc->setCId($category);
            $gc->save();
        }
    }
}

if (isset($_POST['good_remove'])) {
    $good = new Good($_POST['g_id']);
    $good->delete();
}