<?php
use engine\classes\Category;
use engine\classes\Router;

$root_category = new Category(Router::getParam('id'));
$categories = Category::getAllCategories();
?>
<h1>Add new category</h1>
<hr>
<form method="post">
    <p class="text-title">Title</p>
    <input class="text-input" type="text" name="title" required="required"/><br>
    <p class="text-title">Parent</p>
    <select class="text-input" name="parent">
        <option value="">Root category</option>
        <?php
        /** @var Category $category */
        foreach ($categories as $category) {
            ?>
            <option <?= $category->getCId() == $root_category->getCId() ? 'selected="selected"' : null ?>
                    value="<?= $category->getCId() ?>"><?= $category->getTitle() ?></option>
            <?php
        }
        ?>
    </select>
    <br>
    <a class="btn btn-white btn-big" href="/admin/categories/id/<?= $root_category->getCId() ?>">Go back</a>
    <button class="btn btn-red btn-big" name="category_add" type="submit">Add new Category</button>
</form>