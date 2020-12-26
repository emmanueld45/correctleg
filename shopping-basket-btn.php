<input type="text" class="cart-total-number" value=" <?php if (isset($_SESSION['cart'])) {
                                                            echo count($_SESSION['cart']);
                                                        } else {
                                                            echo "0";
                                                        } ?>" style="display:none;">
<a href="cart.php"><button class="shopping-basket-btn">
        <i class="fa fa-shopping-basket"></i>
        <span class="shopping-basket-btn-value">
            <?php if (isset($_COOKIE['cl_cart'])) {
                echo $product->getTotalNumItemsInCart();
            } else {
                echo "0";
            } ?></span>
    </button></a>