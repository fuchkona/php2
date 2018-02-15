<?php
use engine\classes\Category;
use engine\classes\Good;
use engine\classes\Router;
use engine\ui\CheckBoxGroup;

$categories = Category::getTreeOfCategories();

if ($id = Router::getParam('id')) {
    $good = new Good($id);
    ?>
    <h1>Edit good</h1>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <input class="hidden" name="g_id" value="<?= $good->getId() ?>">
        <p class="text-title">Title</p>
        <input class="text-input" type="text" name="title" required="required" value="<?= $good->getTitle() ?>"/>
        <p class="text-title">Photo</p>
        <img style="max-height: 500px" src="/images/dproducts/<?= $good->getPhoto() ?>"><br>
        <input class="text-input" type="file" name="photo">
        <p class="text-title">Description</p>
        <textarea class="text-input" name="description"><?= $good->getDescription() ?></textarea>
        <p class="text-title">Price</p>
        <input class="text-input" type="number" step="0.01" name="price" value="<?= $good->getPrice() ?>" required="required"/><br>
        <p class="text-title">Category</p>
        <div style="max-height: 300px; overflow-y: auto; border: 1px solid lightgray">
            <?php CheckBoxGroup::render($categories, 'categories', $good->getCategoriesId()) ?>
        </div>
        <br>
        <a class="btn btn-white btn-big" href="/admin/goods">Go back</a>
        <button class="btn btn-red btn-big" name="good_add" type="submit">Save</button>
    </form>

    <?php
}
?>