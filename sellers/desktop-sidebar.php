 <?php
    //$sessionid = $_SESSION['id'];
    ?>
 <!-- details section start-->
 <div class="details-section">

     <div style="width:100%;padding-left:10px;color:white;font-weight:bold;">
         <img src="<?php if (seller_have_business_details($sessionid)) {
                        echo "../" . get_seller_business_detail($sessionid, "logo");
                    } else {
                        echo "../businesslogos/default-business-logo.jpg";
                    } ?>" class="business-logo"> SELLER ACCOUNT <i class="fa fa-users"></i>
     </div>
     <div style="width:100%;padding-left:10px;color:white;">
         Welcome <?php if (seller_have_business_details($sessionid)) {
                        echo get_seller_business_detail($sessionid, "companyname");
                    } else {
                        echo get_seller_detail($sessionid, "firstname");
                    } ?>,
     </div>
     <div style="width:100%;padding-left:10px;color:white;">
         <?php echo get_seller_detail($sessionid, "email"); ?>
     </div>


 </div>
 <!-- details section end -->


 <!-- wallet section start -->
 <div class="wallet-section">
     <div style="width:100%;padding:10px;">
         <span style="color:mediumseagreen;">Active balance: <span>&#8358</span><?php echo number_format(get_seller_detail($sessionid, "activebalance")); ?>.00</span><br>
         <span style="color:orange;">Pending balance: <span>&#8358</span><?php echo number_format(get_seller_detail($sessionid, "pendingbalance")); ?>.00</span><br>
         <span style="color:orange;">Pending withdrawals: <span>&#8358</span><?php echo number_format(get_seller_detail($sessionid, "pendingwithdrawals")); ?>.00</span><br>
         <span style="color:;">Seller Code: <span style="color:mediumseagreen;"><?php echo get_seller_detail($sessionid, "cid"); ?></span></span>
     </div>
 </div>
 <!-- wallet section end -->

 <div style="width:100%;padding:10px;color:rgb(90, 90, 90);">MY CORRECTLEG ACCOUNT</div>

 <!-- start of items container -->
 <div class="items-container">


     <!-- Add New-->
     <a href="add-new-choose" style="color:inherit;">
         <div class="items-box">
             <i class="fa fa-edit"></i> Add New <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
         </div>
     </a>


     <!-- Orders-->
     <a href="active-orders" style="color:inherit;">
         <div class="items-box">
             <i class="fa fa-envelope"></i> My Orders <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
         </div>
     </a>








     <!-- My items-->
     <a href="my-retail-items" style="color:inherit;">
         <div class="items-box">
             <i class="fa fa-shopping-cart"></i> My Retail Items <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
         </div>
     </a>

     <a href="my-wholesale-items" style="color:inherit;">
         <div class="items-box">
             <i class="fa fa-shopping-cart"></i> My wholesale Items <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
         </div>
     </a>

     <!-- Clearance sales-->
     <a href="promotions" style="color:inherit;">
         <div class="items-box" style="color:crimson;">
             <i class="fa fa-gift"></i> Promotions <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
         </div>
     </a>



 </div>
 <!-- end of items container -->





















 <div style="width:100%;padding:10px;color:rgb(90, 90, 90);">ACCOUNT SETTINGS</div>

 <!-- start of items container -->
 <div class="items-container">


     <!-- tour video--
     <a href="tour-video" style="color:inherit;">
         <div class="items-box">
             <i class="fa fa-play-circle"></i> Tour video <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
         </div>
     </a>

     <!-- Withdrawals-->
     <a href="withdraw" style="color:inherit;">
         <div class="items-box">
             <i class="fa fa-download"></i> Withdrawal <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
         </div>
     </a>


     <!-- Personal Details-->
     <a href="personal-details" style="color:inherit;">
         <div class="items-box">
             <i class="fa fa-user"></i> Personal Details <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
         </div>
     </a>


     <!-- business Details-->
     <a href="business-details" style="color:inherit;">
         <div class="items-box">
             <i class="fa fa-file"></i> Business Details <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
         </div>
     </a>

     <!-- banks Details-->
     <a href="bank-details" style="color:inherit;">
         <div class="items-box">
             <i class="fa fa-bank"></i> Bank Details <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
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