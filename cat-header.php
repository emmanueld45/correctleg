 <!-- Humberger Begin -->
 <div class="humberger__menu__overlay" style="z-index:2000;"></div>
 <div class="humberger__menu__wrapper" style="z-index:2100;">
     <div class="humberger__menu__logo">
         <!-- <a href="#"><img src="img/logo.png" alt="" /></a> -->
         <a href="index.php"><span style="color:crimson;font-weight:bold;font-size:20px;">CORRECT<span style="color:black;">LEG</span></span></a>

     </div>
     <!-- <div class="humberger__menu__cart">
         <ul>
             <li>
                 <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
             </li>
             <li>
                 <a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a>
             </li>
         </ul>
         <div class="header__cart__price">item: <span>$150.00</span></div>
     </div> -->
     <!-- <div class="humberger__menu__widget">
         <div class="header__top__right__language">
             <img src="img/language.png" alt="" />
             <div>English</div>
             <span class="arrow_carrot-down"></span>
             <ul>
                 <!-- <li><a href="#">Spanis</a></li> 
                 <li><a href="#">English</a></li>
             </ul>
         </div>
         <div class="header__top__right__auth">
             <a href="customers"><i class="fa fa-user"></i> Login</a>
         </div>
     </div> -->

     <!-- filter container start -->
     <?php include 'mobile-filter-container.php'; ?>
     <!--filter container end -->

     <!-- <nav class="humberger__menu__nav mobile-menu">
         <ul>
             <li class="active"><a href="index.php">Home</a></li>
             <li><a href="./shop-grid.html">Shop</a></li>
             <li>
                 <a href="#">Pages</a>
                 <ul class="header__menu__dropdown">
                     <li><a href="./shop-details.html">Shop Details</a></li>
                     <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                     <li><a href="./checkout.html">Check Out</a></li>
                     <li><a href="./blog-details.html">Blog Details</a></li>
                 </ul>
             </li>
             <li><a href="./blog.html">Blog</a></li>
             <li><a href="./contact.html">Contact</a></li>
         </ul>
     </nav> -->
     <div id="mobile-menu-wrap"></div>
     <!-- <div class="header__top__right__social">
         <a href="#"><i class="fa fa-facebook"></i></a>
         <a href="#"><i class="fa fa-twitter"></i></a>
         <a href="#"><i class="fa fa-linkedin"></i></a>
         <a href="#"><i class="fa fa-pinterest-p"></i></a>
     </div> -->
     <div class="humberger__menu__contact">
         <ul>
             <!-- <li><i class="fa fa-envelope"></i> hello@correctleg.com</li> -->

         </ul>
     </div>
 </div>
 <!-- Humberger End -->






















 <!-- <img src="img/jumia-header-banner.gif" class="top-head-banner"> -->
 <!-- Header Section Begin -->
 <header class="header myheader" style="background-color:white;margin-bottom:0px;">
     <?php include 'banner-handler.php'; ?>
     <div class="header__top">
         <div class="" style="background-color:crimson;width:100%;color:white;padding-left:10px;padding-right:10px;">
             <div class="row" style="background-color:rgba(0, 0, 0, 0.2);margin-right:0px;">
                 <div class="col-lg-6 col-md-6">
                     <div class="header__top__left">
                         <ul>
                             <li><i class="fa fa-envelope"></i> hello@correctleg.com</li>
                             <li>Free Shipping for all in Riverstate and Lagos</li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-6 col-md-6">
                     <div class="header__top__right">
                         <div class="header__top__right__social">
                             <a href="#"><i class="fa fa-facebook"></i></a>
                             <a href="#"><i class="fa fa-twitter"></i></a>
                             <a href="#"><i class="fa fa-instagram"></i></a>

                         </div>
                         <div class="header__top__right__language">
                             <?php
                                if (!isset($_SESSION['id'])) {
                                    echo "  <div><i class='fa fa-user'></i> Login</div>
                             <span class='arrow_carrot-down'></span>
                             <ul>

                                 <li><a href='sellers'>Seller</a></li>
                                 <li><a href='customers'>Customer</a></li>

                             </ul> ";
                                } else {
                                    echo "<div><a href='logout.php' style='color:white;'><i class='fa fa-user'></i> Logout</a></div>";
                                }
                                ?>

                         </div>
                         <div class="header__top__right__auth">

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="header__logo header-logo-holder">
                     <!-- <a href="./index.html"><img src="img/logo.png" alt="" /></a> -->
                     <a href="index.php"><span style="color:crimson;font-weight:bold;">CORRECT<span style="color:black;">LEG</span></span></a>
                 </div>
             </div>
             <div class="col-lg-9">
                 <nav class="header__menu">
                     <ul>
                         <li class="active"><a href="./index.php" style="color:black !important;"><i class="fa fa-home"></i> Home</a></li>
                         <li><a href="become-a-seller.php" style="color:black !important;"><i class="fa fa-user"></i> Be a seller</a></li>
                         <li><a href="exclusive.php" style="color:black;" class="exclusive-text"><i class="fa fa-check-circle"></i> Exclusive</a></li>
                         <!-- <li><a href="wholesale.php" style="color:black;"><i class="fa fa-shopping-cart"></i>Wholesale</a></li> -->
                         <li>
                             <?php
                                if (!isset($_SESSION['id'])) {
                                    echo '<a href="#" style="color:black !important;"><i class="fa fa-sign-in"></i>Login</a>
                             <ul class="header__menu__dropdown" style="z-index:1100;">
                                 <li><a href="sellers" >Seller account</a></li>
                                 <li><a href="customers">Buyer account</a></li>

                             </ul>';
                                } else {

                                    echo '<a href="logout.php" style="color:black !important;"><i class="fa fa-user"></i> Logout</a>';
                                }
                                ?>
                         </li>
                         <?php
                            if (isset($_SESSION['id'])) {
                                if (customer_is_logged_in($_SESSION['id'])) {
                                    echo '<li><a href="customers/profile.php" style="color:black;"><i class="fa fa-dashboard"></i> My profile</a></li>';
                                }
                                if (seller_is_logged_in($_SESSION['id'])) {
                                    echo '<li><a href="sellers/profile.php" style="color:black;"><i class="fa fa-dashboard"></i> My profile</a></li>';
                                }
                            }
                            ?>
                         <!-- <li><a href="./blog.html">Blog</a></li>
                         <li><a href="./contact.html">Contact</a></li> -->
                     </ul>
                 </nav>
             </div>
             <!-- <div class="col-lg-3">
                  <div class="header__cart">
                     <ul>
                         <li>
                             <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
                         </li>
                         <li>
                             <a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a>
                         </li>
                     </ul>
                     <div class="header__cart__price">item: <span>$150.00</span></div>
                 </div> 
             </div> -->
         </div>
         <div class="humberger__open">
             <i class="fa fa-bars"></i>
         </div>
     </div>
 </header>
 <!-- Header Section End -->


 <!-- Hero Section Begin -->
 <section class="hero hero-normal myhero" style="padding:10px;background-color:white;z-index:10;">
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="hero__categories">
                     <div class="hero__categories__all">
                         <i class="fa fa-bars"></i>
                         <span>Top Brands</span>
                     </div>
                     <ul>
                         <li><a href="">FK Olubabe</a></li>
                         <li><a href="">Jack Abels</a></li>
                         <li><a href="">Kene Rapu</a></li>
                         <li><a href="">Xeexs</a></li>
                         <li><a href="">T.T Dack</a></li>
                         <li><a href="">Obacouture</a></li>
                         <li><a href="">Rd Solen</a></li>
                         <li><a href="">K.Aspen</a></li>
                         <li><a href="">Muroks Xpressions</a></li>
                         <li><a href="">Mona Mathews</a></li>
                         <li><a href="">Mira Oma Luxury</a></li>
                         <li><a href="">Hom Shoes</a></li>
                         <li><a href="">Yili Footwear</a></li>
                         <li><a href="">Ethnik</a></li>
                         <li><a href="">A.P.I.N.K.E</a></li>
                         <li><a href="">313 Eko</a></li>
                         <li><a href="">Ivy Barber</a></li>
                         <li><a href="">May Anthony</a></li>




                     </ul>
                 </div>
             </div>
             <div class="col-lg-9">
                 <div class="hero__search">
                     <div class="hero__search__form">
                         <form action="search-page.php" method="GET">
                             <!-- <div class="hero__search__categories">

                                 <span class="arrow_carrot-down"></span>
                             </div> -->
                             <input type="text" name="search" class="search-bar-field" style="height:;background-color:;" placeholder="Search.." />
                             <button type="submit" class="site-btn search-bar-btn" style="font-size:13px !important;">SEARCH</button>
                         </form>
                     </div>
                     <div class="hero__search__phone">
                         <div class="hero__search__phone__icon">
                             <i class="fa fa-phone"></i>
                         </div>
                         <div class="hero__search__phone__text">
                             <h5>+234 816 238 3712</h5>
                             <span>support 24/7 time</span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Hero Section End -->