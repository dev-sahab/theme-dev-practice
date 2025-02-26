<div class="cartmini__area">
    <div class="cartmini__wrapper d-flex justify-content-between flex-column">
        <div class="cartmini__top-wrapper ">
            <div class="cartmini__top p-relative">
                <div class="cartmini__title">
                    <h4>Shopping cart</h4>
                </div>
                <div class="cartmini__close">
                    <button type="button" class="cartmini__close-btn cartmini-close-btn"><i class="fal fa-times"></i></button>
                </div>
            </div>
            <div class="cartmini__widget">
                <div class="mini_shopping_cart_box"><?php woocommerce_mini_cart(); ?></div>
            </div>
        </div>
        <div class="cartmini__checkout d-none">
            <div class="cartmini__checkout-title mb-30">
                <h4>Subtotal:</h4>
                <span>$113.00</span>
            </div>
            <div class="cartmini__checkout-btn">
                <a href="cart.html" class="tp-btn mb-10 w-100"> <span></span> view cart</a>
                <a href="checkout.html" class="tp-btn-border w-100"> <span></span> checkout</a>
            </div>
        </div>
    </div>
</div>