<?php
use engine\classes\Category;
use engine\ui\CheckBoxGroup;

$categories = Category::getTreeOfCategories();
?>
<h1>Add new good</h1>
<hr>
<form method="post" enctype="multipart/form-data">
    <p class="text-title">Title</p>
    <input class="text-input" type="text" name="title" required="required"/><br>
    <p class="text-title">Photo</p>
    <input class="text-input" type="file" name="photo">
    <p class="text-title">Description</p>
    <textarea class="text-input" name="description"></textarea>
    <p class="text-title">Price</p>
    <input class="text-input" type="number" step="0.01" name="price" value="0.00" required="required"/><br>
    <p class="text-title">Category</p>
    <div style="max-height: 300px; overflow-y: auto; border: 1px solid lightgray">
        <?php CheckBoxGroup::render($categories, 'categories') ?>
    </div>
    <br>
    <a class="btn btn-white btn-big" href="/admin/goods">Go back</a>
    <button class="btn btn-red btn-big" name="good_add" type="submit">Add new good</button>
</form>