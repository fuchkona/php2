<?php
use engine\classes\Good;

$goods = Good::getAll();

?>
<h1>Goods</h1>
<hr>
<a class="btn btn-white" href="/admin/good_add">Add new good</a>
<table class="table">
    <thead>
    <tr>
        <th><p class="text-title">Photo</p></th>
        <th><p class="text-title">Title</p></th>
        <th><p class="text-title">Description</p></th>
        <th><p class="text-title">Price</p></th>
        <th><p class="text-title">Visits</p></th>
        <th><p class="text-title">Categories</p></th>
        <th><p class="text-title">Actions</p></th>
    </tr>
    </thead>
    <tbody>
    <?php
    /** @var Good $good */
    foreach ($goods as $good) {
        ?>
        <tr>
            <td><img style="max-height: 100px" src="/images/dproducts/<?= $good->getPhoto() ?>" /></td>
            <td><a class="text-title"
                   href="/admin/good/id/<?= $good->getId() ?>"><?= $good->getTitle(); ?></a></td>
            <td><?= $good->getDescription() ?></td>
            <td><?= $good->getPrice() ?></td>
            <td><?= $good->getVisits() ?></td>
            <td><?= implode(', ', $good->getCategoriesTitle()) ?></td>
            <td>
                <form method="post">
                    <input class="hidden" name="g_id" type="number" value="<?= $good->getId() ?>"/>
                    <a href="/admin/good_edit/id/<?= $good->getId() ?>" class="btn btn-white"
                       title="Edit"><span class="fa fa-edit"></span></a>
                    <button class="btn btn-red" type="submit" name="good_remove" title="Remove">
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