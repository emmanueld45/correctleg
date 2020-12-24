 <!-- cart modal start -->
 <div class="cart-modal-background"></div>
 <div class="cart-modal">
     <button class="cart-modal-close-btn"><i class="fa fa-times"></i></button>

     <div class="cart-item-container">
         <div class="cart-item-header">Item has been Added to Cart</div>
         <div class="cart-item-box">
             <div class="cart-item-box-left">
                 <img src="img/foot4.jpg" class="cart-item-box-img">
             </div>
             <div class="cart-item-box-right">
                 <span class="cart-item-name" style="font-weight:600;">Classic Shoe</span><br>
                 <!-- <i class="fa fa-star" style="color:orange"></i>
                 <i class="fa fa-star" style="color:orange"></i>
                 <i class="fa fa-star" style="color:orange"></i><br> -->
                 <span class="cart-item-price-sign">&#8358</span><span class="cart-item-price">5,000</span><br>
                 <div class="product__details__quantity">
                     x <span class="how-many-items"></span>
                 </div>
                 <a href="cart" style="color:inherit">
                     <div style="width:100%;display:flex;flex-flow:row wrap;justify-content:center;margin-top:10px;border-radius:0px 0px 20px 20px;background-color:;">
                         <button class="cart-checkout-btn">CHECKOUT <i class="fa fa-arrow-right"></i></button>
                     </div>
                 </a>

                 <div style="width:100%;display:flex;flex-flow:row wrap;justify-content:center;margin-top:10px;border-radius:0px 0px 20px 20px;background-color:;">
                     <button class="cart-continue-btn"><i class="fa fa-arrow-left"></i> CONTINUE SHOPPING </button>
                 </div>

             </div>
         </div>
     </div>
 </div>

 <!-- cart modal end -->


 <!-- item exist modal start -->
 <div class="item-exist-modal-background"></div>
 <div class="item-exist-modal">
     <button class="item-exist-modal-close-btn"><i class="fa fa-times"></i></button>
     <div class="cart-item-exist-title">Item Already In Cart</div>
     <div class="cart-item-exist-icon"><i class="fa fa-shopping-cart"></i></div>
     <a href="cart.php" style="color:inherit;">
         <div style="width:100%;display:flex;flex-flow:row wrap;justify-content:center;margin-top:10px;border-radius:0px 0px 20px 20px;background-color:;">
             <button class="cart-item-exist-checkout-btn"> VIEW CART <i class="fa fa-arrow-right"></i></button>
         </div>
     </a>

     <div style="width:100%;padding:10px;display:flex;justify-content:center;">
         <button class="cart-item-exist-btn">Close</button>
     </div>
 </div>

 <!-- item exist modal end -->