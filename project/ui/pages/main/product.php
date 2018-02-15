<?php
use engine\classes\Good;
use engine\classes\Router;
$id = Router::getParam('id');
$good = new Good($id);
if ($good->getId()) {
    ?>
    <?php require_once __DIR__ . '/common/top_article.php'; ?>
    <?php require_once __DIR__ . '/product/slider.php' ?>
    <?php require_once __DIR__ . '/product/body.php' ?>
    <?php require_once __DIR__ . '/product/others.php' ?>
    <?php
}
