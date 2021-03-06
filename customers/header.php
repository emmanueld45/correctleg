 <!-- Humberger Begin -->
 <div class="humberger__menu__overlay"></div>
 <div class="humberger__menu__wrapper" style="z-index:1000;">
     <div class="humberger__menu__logo">
         <!-- <a href="#"><img src="img/logo.png" alt="" /></a> -->
         <a href="../" style="font-size:20px;color:crimson;font-weight:bold;">CORRECT<span style="color:black" ;>LEG</span></a>

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
                  <li><a href="#">Spanis</a></li> 
                  <li><a href="#">English</a></li>
             </ul>
         </div>
         <div class="header__top__right__auth">
             <a href="../logout.php"><i class="fa fa-user"></i> Logout</a>
         </div>
     </div> -->
     <p class="active"><a href="../" style="color:rgb(100, 100, 100);"><i class="fa fa-home"></i> &nbsp &nbsp Home</a></p>
     <p><a href="profile.php" style="color:rgb(100, 100, 100);"><i class="fa fa-dashboard"></i> &nbsp &nbsp Dashboard</a></p>
     <p><a href="../contact-us" style="color:rgb(100, 100, 100);"><i class="fa fa-envelope"></i> &nbsp &nbsp Contact Us</a></p>
     <p><a href="../logout" style="color:rgb(100, 100, 100);"><i class="fa fa-user"></i> &nbsp &nbsp Logout</a></p>
     <nav class="humberger__menu__nav mobile-menu">
         <!-- <ul>

             <li class="active"><a href="../index.php" style="color:black;"><i class="fa fa-home"></i>Home</a></li>
             <li><a href="profile.php" style="color:black;"><i class="fa fa-dashboard"></i>Dashboard</a></li>
             <li><a href="../contact-us.php" style="color:black;"><i class="fa fa-envelope"></i>Contact Us</a></li>
             <li><a href="../logout.php" style="color:black;"><i class="fa fa-user"></i>Logout</a></li>


         </ul> -->




     </nav>
     <div id="mobile-menu-wrap"></div>
     <!-- <div class="header__top__right__social">
         <a href="#"><i class="fa fa-facebook"></i></a>
         <a href="#"><i class="fa fa-twitter"></i></a>
         <a href="#"><i class="fa fa-linkedin"></i></a>
         <a href="#"><i class="fa fa-pinterest-p"></i></a>
     </div> -->
     <!-- <div class="humberger__menu__contact">
         <ul>
             <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
             <li>Free Shipping for all Order of $99</li>
         </ul>
     </div> -->
 </div>
 <!-- Humberger End -->

 <!-- Header Section Begin -->
 <header class="header">
     <div class="header__top">
         <div class="" style="background-color:crimson;width:100%;color:white;padding-left:10px;padding-right:10px;">
             <div class="row" style="background-color:rgba(0, 0, 0, 0.2);margin-right:0px;">
                 <div class="col-lg-6 col-md-6">
                     <div class="header__top__left">
                         <ul>
                             <li style="color:white;"><i class="fa fa-envelope"></i> hello@correctleg.com</li>
                             <!-- <li>Free Shipping for all Order of $99</li> -->
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-6 col-md-6">
                     <div class="header__top__right">
                         <!-- <div class="header__top__right__social">
                             <a href="#"><i class="fa fa-facebook"></i></a>
                             <a href="#"><i class="fa fa-twitter"></i></a>
                             <a href="#"><i class="fa fa-linkedin"></i></a>
                             <a href="#"><i class="fa fa-pinterest-p"></i></a>
                         </div> -->
                         <div class="header__top__right__language">
                             <?php
                                if (!isset($_SESSION['id'])) {
                                    echo "  <div><i class='fa fa-user'></i> Login</div>
                             <span class='arrow_carrot-down'></span>
                             <ul>

                                 <li><a href='sellers'>As Seller</a></li>
                                 <li><a href='customers'>As Customer</a></li>

                             </ul> ";
                                } else {
                                    echo "<div><a href='../logout' style='color:white;'><i class='fa fa-user'></i> Logout</a></div>";
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
                 <div class="header__logo">
                     <!-- <a href="./index.html"><img src="img/logo.png" alt="" /></a> -->
                     <a href="../"><span style="color:crimson;font-weight:bold;font-size:30px;">CORRECT<span style="color:black;">LEG</span></span></a>
                 </div>
             </div>
             <div class="col-lg-9">
                 <nav class="header__menu">
                     <ul>
                         <li class="active"><a href="../" style="color:black;"><i class="fa fa-home"></i> Home</a></li>
                         <li><a href="profile" style="color:black;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                         <li><a href="../contact-us" style="color:black;"><i class="fa fa-envelope"></i> Contact Us</a></li>
                         <li><a href="../logout" style="color:black;"><i class="fa fa-user"></i> Logout</a></li>




                     </ul>
                 </nav>
             </div>

         </div>
         <div class="humberger__open">
             <i class="fa fa-bars"></i>
         </div>
     </div>
 </header>
 <!-- Header Section End -->


 <!-- Hero Section Begin --
 <section class="hero hero-normal">
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="hero__categories">
                     <div class="hero__categories__all">
                         <i class="fa fa-bars"></i>
                         <span>All Categories</span>
                     </div>
                     <ul>
                         <li><a href="#">Fresh Meat</a></li>
                         <li><a href="#">Vegetables</a></li>
                         <li><a href="#">Fruit & Nut Gifts</a></li>
                         <li><a href="#">Fresh Berries</a></li>
                         <li><a href="#">Ocean Foods</a></li>
                         <li><a href="#">Butter & Eggs</a></li>
                         <li><a href="#">Fastfood</a></li>
                         <li><a href="#">Fresh Onion</a></li>
                         <li><a href="#">Papayaya & Crisps</a></li>
                         <li><a href="#">Oatmeal</a></li>
                         <li><a href="#">Fresh Bananas</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-9">
                 <div class="hero__search">
                     <div class="hero__search__form">
                         <form action="#">
                             <div class="hero__search__categories">
                                 All Categories
                                 <span class="arrow_carrot-down"></span>
                             </div>
                             <input type="text" placeholder="What do yo u need?" />
                             <button type="submit" class="site-btn">SEARCH</button>
                         </form>
                     </div>
                     <div class="hero__search__phone">
                         <div class="hero__search__phone__icon">
                             <i class="fa fa-phone"></i>
                         </div>
                         <div class="hero__search__phone__text">
                             <h5>+65 11.188.888</h5>
                             <span>support 24/7 time</span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Hero Section End -->