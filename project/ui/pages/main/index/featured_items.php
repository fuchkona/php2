<?php

use engine\classes\Good;

$featured_goods = Good::getTopGoods(8);
?>
<div class="featured-items container content">
    <div class="featured-items-title">Fetured Items</div>
    <div class="featured-items-sub-title">Shop for items based on what we featured in this week</div>
    <div class="featured-items-box box-flex">
        <?php
        /** @var Good $good */
        foreach ($featured_goods as $good) {
            ?>
            <div id="<?= $good->getId() ?>" class="products-item">
                <div class="products-item-hover">
                    <button class="add-to-cart-btn">
                        <img src="/images/cart-w.png" alt="">
                        Add to Cart
                    </button>
                </div>
                <figure>
                    <img src="/images/dproducts/<?= $good->getPhoto() ?>" alt="">
                    <figcaption class="products-item-title"><?= $good->getTitle() ?></figcaption>
                </figure>
                <div class="products-item-price">$<?= $good->getPrice() ?></div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="featured-items-btn">
        <a class="btn-red" href="products">Browse All Product <span class="fa fa-long-arrow-right"></span></a>
    </div>
</div>