               <?php

                ?>
               <!-- details section start-->
               <div class="details-section">


                   <div style="width:100%;padding-left:10px;color:white;">
                       Welcome <?php echo get_customer_detail($sessionid, "firstname"); ?>,
                   </div>
                   <div style="width:100%;padding-left:10px;color:white;">
                       <?php echo get_customer_detail($sessionid, "email"); ?>
                   </div>


               </div>
               <!-- details section end -->


               <!-- wallet section start -->
               <div class="wallet-section">
                   <div style="width:100%;padding:10px;color: crimson;">
                       wallet: <i class="fa fa-wallet"></i> <span>&#8358</span><?php echo number_format(get_customer_detail($sessionid, "cwallet")) . ".00"; ?>
                   </div>
               </div>
               <!-- wallet section end -->

               <div style="width:100%;padding:10px;color:rgb(90, 90, 90);">MY CORRECTLEG ACCOUNT</div>

               <!-- start of items container -->
               <div class="items-container">

                   <!-- Dashboard-->
                   <a href="profile" style="color:inherit;">
                       <div class="items-box">
                           <i class="fa fa-dashboard"></i> Dashboard <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                       </div>
                   </a>

                   <!-- Orders-->
                   <a href="my-orders" style="color:inherit;">
                       <div class="items-box">
                           <i class="fa fa-shopping-cart"></i> My Orders <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                       </div>
                   </a>





                   <!-- saved items-->
                   <a href="saved-items" style="color:inherit;">
                       <div class="items-box">
                           <i class="fa fa-heart"></i> Saved Items <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                       </div>
                   </a>

                   <!-- Recently viewed-->
                   <a href="recently-viewed" style="color:inherit;">
                       <div class="items-box">
                           <i class="fa fa-refresh"></i> Recently Viewed <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                       </div>
                   </a>

                   <!-- My Coupons-->
                   <a href="my-coupons" style="color:inherit;">
                       <div class="items-box">
                           <i class="fa fa-gift"></i> My Coupons <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                       </div>
                   </a>

               </div>
               <!-- end of items container -->





















               <div style="width:100%;padding:10px;color:rgb(90, 90, 90);">ACCOUNT SETTINGS</div>

               <!-- start of items container -->
               <div class="items-container">


                   <!-- Details-->
                   <a href="my-details" style="color:inherit;">
                       <div class="items-box">
                           <i class="fa fa-user"></i> Details <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                       </div>
                   </a>


                   <!-- Address book-->
                   <a href="address-book" style="color:inherit;">
                       <div class="items-box">
                           <i class="fa fa-map-marker"></i> Address Book <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                       </div>
                   </a>

                   <!-- Change Password-->
                   <a href="change-password" style="color:inherit;">
                       <div class="items-box">
                           <i class="fa fa-lock"></i> Change Password <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                       </div>
                   </a>


                   <!-- Logout-->
                   <a href="../logout" style="color:red;">
                       <div class="items-box" style="color:red">
                           <i class="fa fa-sign-out"></i> Logout <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                       </div>
                   </a>




               </div>
               <!-- end of items container -->