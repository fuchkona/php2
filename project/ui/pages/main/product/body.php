<div class="container content">
    <div class="single-product-body">
        <div class="single-product-category-name"><?= implode(', ', $good->getCategoriesTitle()) ?></div>
        <div class="single-product-devider-1">
            <div class="dev-light"></div>
            <div class="dev-heavy"></div>
            <div class="dev-light"></div>
        </div>
        <article>
            <h2 class="single-product-name"><?= $good->getTitle() ?></h2>
            <p class="single-product-description">
                <?= $good->getDescription() ?>
            </p>
        </article>
        <div class="single-product-material-and-design">
            <div>
                MATERIAL: <span>COTTON</span>
            </div>
            <div>
                DESIGNER: <span>BINBURHAN</span>
            </div>
        </div>
        <div class="single-product-price">$<?= $good->getPrice() ?></div>
        <div class="single-product-devider-line"></div>
        <div class="single-product-filter-box">
            <div>
                <div>CHOOSE COLOR</div>
                <select title="color-select">
                    <option value="1">RED</option>
                    <option value="2">GREEN</option>
                    <option value="3">BLUE</option>
                </select>
            </div>
            <div>
                <div>CHOOSE SIZE</div>
                <select title="size-select">
                    <option value="XXS">XXS</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option selected value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>
            <div>
                <div>QUANTITY</div>
                <input type="number" min="1" max="1000" value="1" title="quantity-number">
            </div>
        </div>
        <button class="single-product-add-to-cart-btn">
            <img src="/images/cart-m.png" alt="">
            Add to Cart
        </button>
    </div>
</div>