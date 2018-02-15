<?php
use engine\classes\Category;
use engine\classes\Good;
use engine\classes\Router;
use engine\ui\ListUl;

$categories = Category::getTreeOfCategories();

if ($id = Router::getParam('id')) {
    $good = new Good($id);
    ?>
    <h1>Good <?= $good->getTitle() ?></h1>
    <hr>
    <p class="text-title">Description:</p>
    <p><?= $good->getDescription() ?></p>
    <p class="text-title">Price: <?= $good->getPrice() ?></p>
    <p class="text-title">Visits: <?= $good->getVisits() ?></p>
    <p class="text-title">Category:</p>
    <?php ListUl::render($categories, $good->getCategoriesId()) ?>
    <?php
}
?>
<a class="btn btn-white btn-big" href="/admin/goods">Go back</a>
