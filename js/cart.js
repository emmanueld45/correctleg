// open cart modal start
function open_cart_modal() {
  $(".cart-modal-background").fadeIn();
  $(".cart-modal").fadeIn();
}

// open cart modal end

// close cart modal start
$(".cart-modal-close-btn").click(function () {
  $(".cart-modal-background").fadeOut();
  $(".cart-modal").fadeOut();
});

$(".cart-continue-btn").click(function () {
  $(".cart-modal-background").fadeOut();
  $(".cart-modal").fadeOut();
});

$(".cart-modal-background").click(function () {
  $(".cart-modal-background").fadeOut();
  $(".cart-modal").fadeOut();
});

// close cart modal end

/** ITEM ALREADY IN CART START ***/
// open item exist modal start
function open_item_exist_modal() {
  $(".item-exist-modal-background").fadeIn();
  $(".item-exist-modal").fadeIn();
}

// open item exist modal end

// close item exist modal start
$(".item-exist-modal-close-btn").click(function () {
  $(".item-exist-modal-background").fadeOut();
  $(".item-exist-modal").fadeOut();
});

$(".cart-item-exist-btn").click(function () {
  $(".item-exist-modal-background").fadeOut();
  $(".item-exist-modal").fadeOut();
});

$(".item-exist-modal-background").click(function () {
  $(".item-exist-modal-background").fadeOut();
  $(".item-exist-modal").fadeOut();
});

// close item exist modal end

/** ITEM ALREADY IN CART END   ***/

/** ADD TO CART FUNCTIONALITY START ****/

// add item to cart start
$(".add-to-cart-btn").click(function () {
  var item_id = $(this).attr("id");
  var item_image = $(this).attr("itemimagesrc");
  var item_name = $(this).attr("itemname");
  var how_many = $(".howmany").val();
 
  if(variation_price == ""){
  var item_price = $(this).attr("itemprice");
  var item_size = $(this).attr("itemsize");

  }else{
    var item_price = variation_price;
    var item_size = variation_size;
  }
  var promotion_id = $(".promotion-id").val();

  $(".cart-item-box-img").attr("src", item_image);
  $(".cart-item-name").html(item_name);
  $(".cart-item-price").html(item_price);
  $(".how-many-items").html(how_many);
  // open_cart_modal();

 if(variation_price == "" && item_have_variation == "yes"){
   alert("Kindly select a size variation for this item")
   $(".variation-error-display").html("Click the box below to pick a size <br>");
 }else{
  add_item_to_cart = "yes";
  $.ajax({
    url: "new-cart-handler.php",
    method: "POST",
    async: false,
    data: {
      add_item_to_cart: add_item_to_cart,
      item_id: item_id,
      how_many: how_many,
      item_price: item_price,
      item_name: item_name,
      item_image: item_image,
      item_size: item_size,
      variation_price: variation_price,
      promotion_id: promotion_id,
    },
    success: function (data) {
      if (data == "nostocks") {
        alert("Item out of stocks");
      } else if (data == "stocksunavailable") {
        alert(
          "The amount of this item is not up to your selected amount.. Kindly reduce your amount and try again!"
        );
      } else if (data == "added") {
        open_cart_modal();
        var cart_total_number = $(".cart-total-number").val();

        cart_total_number = parseInt(cart_total_number) + 1;
        //alert(cart_total_number);
        $(".shopping-basket-btn-value").html(cart_total_number);
      } else if (data == "alreadyexists") {
        open_item_exist_modal();
      }
    },
  });
}

});
// add item to cart end

// remove item from cart start
$(".remove-cart-item-btn").click(function () {
  var item_id = $(this).attr("id");
  remove_cart_item = "yes";
  $.ajax({
    url: "cart-handler.php",
    method: "POST",
    async: false,
    data: {
      remove_cart_item: remove_cart_item,
      item_id: item_id,
    },
    success: function (data) {
      window.location.href = "product.php?cart_item_removed=true";
    },
  });
});
// remove item from cart end

// save item start

$(".save-item-btn").click(function () {
  var item_id = $(this).attr("id");
  save_item = "yes";

  $.ajax({
    url: "save-item-handler.php",
    method: "POST",
    async: false,
    data: {
      save_item: save_item,
      item_id: item_id,
    },
    success: function (data) {
      if (data == "loginfirst") {
        alert("you have to login first to save item");
      } else if (data == "itemalreadysaved") {
        alert("item has been already saved");
      } else if (data == "itemsaved") {
        alert("item has been saved");
      }
    },
  });
});

// save item end
/** ADD TO CART FUNCTIONALITY END */
