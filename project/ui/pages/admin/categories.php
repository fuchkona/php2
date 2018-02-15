<?php
use engine\classes\Category;
use engine\classes\Router;

$root_category = new Category(Router::getParam('id'));
if ($root_category->getCId()) {
    $categories = $root_category->getChildren();
} else {
    $categories = Category::getMainCategories();
}

?><?php
if ($root_category->getCId()) {
    ?>
    <h1>Category <?= $root_category->getTitle() ?></h1>
    <?php
} else {
    ?>
    <h1>Categories</h1>
    <?php
}
?>

<hr>
<?php
if ($root_category->getCId()) {
    ?>
    <a class="btn btn-white" href="/admin/categories/id/<?= $root_category->getParent() ?>">Go to one level UP</a>
    <?php
}
?>
<a class="btn btn-white" href="/admin/category_add/id/<?= $root_category->getCId() ?>">Add new category</a>
<table class="table">
    <thead>
    <tr>
        <th><p class="text-title">Name</p></th>
        <th><p class="text-title">Children</p></th>
        <th><p class="text-title">Actions</p></th>
    </tr>
    </thead>
    <tbody>
    <?php
    /** @var Category $category */
    foreach ($categories as $category) {
        ?>
        <tr>
            <td><a class="text-title"
                   href="/admin/categories/id/<?= $category->getCId() ?>"><?= $category->getTitle(); ?></a></td>
            <td><?= count($category->getChildren()); ?></td>
            <td>
                <form method="post">
                    <input class="hidden" name="c_id" type="number" value="<?= $category->getCId() ?>"/>
                    <a href="/admin/category_edit/id/<?= $category->getCId() ?>" class="btn btn-white"
                       title="Edit"><span class="fa fa-edit"></span></a>
                    <button class="btn btn-red" type="submit" name="category_remove" title="Remove">
                        <span class="fa fa-times"></span>
                    </button>
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>