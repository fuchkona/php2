<?php require_once __DIR__ . '/common/top_article.php'; ?>
<div class="container content">
    <div class="shopping-cart-body">
        <?php require_once __DIR__ . '/shopping_cart/goods.php'; ?>
        <div class="shopping-cart-body-clear-and-continue-shopping">
            <a href="#">CLEAR SHOPPING CART</a>
            <a href="products">CONTINUE sHOPPING</a>
        </div>
        <div class="shopping-cart-body-deal">
            <div class="shopping-cart-body-deal-addresses">
                <div class="title">Shipping Adress</div>
                <select title="city">
                    <option value="1" selected>Bangladesh</option>
                </select>
                <input type="text" title="state" placeholder="State">
                <input type="text" title="postcode" placeholder="Postcode / Zip">
                <button>get a quote</button>
            </div>
            <div class="shopping-cart-body-deal-discount">
                <div class="title">coupon discount</div>
                <div class="sub-title">Enter your coupon code if you have one</div>
                <input type="text" title="state" placeholder="State">
                <button>Apply coupon</button>
            </div>
            <div class="shopping-cart-body-deal-total">
                <div class="sub-title">Sub total <span class="price">$900</span></div>
                <div class="title">GRAND total <span class="price">$900</span></div>
                <hr/>
                <a href="checkout">proceed to checkout</a>
            </div>
        </div>
    </div>
</div>