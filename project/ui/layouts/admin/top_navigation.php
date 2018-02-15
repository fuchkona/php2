<?php

use engine\classes\Router;

$current_page = Router::getCurrentPage();
$pages = [
    ['name' => 'index', 'title' => 'Home', 'href' => '/admin'],
    ['name' => 'categories', 'title' => 'Categories', 'href' => '/admin/categories'],
    ['name' => 'goods', 'title' => 'Goods', 'href' => '/admin/goods'],
    ['name' => 'orders', 'title' => 'Orders', 'href' => '/admin/orders'],
]
?>
<nav class="container nav">
    <ul>
        <?php
        foreach ($pages as $page) {
            ?>
            <li><a href="<?= $page['href'] ?>"
                   class="<?= $current_page == $page['name'] ? 'active' : null ?>"><?= $page['title'] ?></a></li>
            <?php
        }
        ?>
    </ul>
</nav>