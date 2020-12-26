<div class="bottom-nav-container">
    <a href="./" class="bottom-nav-btn"><i class="fa fa-home stroke-transparent"></i><br><span>Home</span></a>
    <a href="customers/login?view_saved_item" class="bottom-nav-btn"><i class="fa fa-heart stroke-transparent"></i><?php if (isset($_SESSION['id']) and customer_is_logged_in($_SESSION['id'])) {
                                                                                                                        echo "<button>" . get_customer_total_saved_items($_SESSION['id']) . "</button>";
                                                                                                                    } ?><br><span>Saved item</span></a>
    <a href="cart" class="bottom-nav-btn"><i class="fa fa-shopping-cart stroke-transparent"></i><?php if (isset($_COOKIE['cl_cart'])) {
                                                                                                    echo "<button class='how-many-items'>" . $product->getTotalNumItemsInCart() . "</button>";
                                                                                                } ?><br><span>View cart</span></a>



    <?php
    $url = "sellers";
    if (!isset($_SESSION['id'])) {
        echo "<a class='bottom-nav-btn bottom-account-btn'>
        <i class='fa fa-user stroke-transparent'></i><br><span>Login</span>
       </a>";
    } else {
        if (customer_is_logged_in($_SESSION['id'])) {
            $url = "customers/profile";
        }
        if (seller_is_logged_in($_SESSION['id'])) {
            $url = "sellers/profile";
        }
        echo "<a href='$url' class='bottom-nav-btn'>
        <i class='fa fa-user stroke-transparent'></i><br><span>Account</span>
       </a>";
    }
    ?>
</div>

<div class="bottom-nav-login-account-container">
    <a href="sellers/login" class="box">Login as seller</a>
    <a href="customers/login" class="box">Login as buyer</a>
</div>