"use strict";

(function ($) {
  /*------------------
        Preloader
    --------------------*/
  $(window).on("load", function () {
    $(".loader").fadeOut();
    $("#preloder").delay(200).fadeOut("slow");

    /*------------------
            Gallery filter
        --------------------*/
    $(".featured__controls li").on("click", function () {
      $(".featured__controls li").removeClass("active");
      $(this).addClass("active");
    });
    if ($(".featured__filter").length > 0) {
      var containerEl = document.querySelector(".featured__filter");
      var mixer = mixitup(containerEl);
    }
  });

  /*------------------
        Background Set
    --------------------*/
  $(".set-bg").each(function () {
    var bg = $(this).data("setbg");
    $(this).css("background-image", "url(" + bg + ")");
  });

  //Humberger Menu
  $(".humberger__open").on("click", function () {
    $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
    $(".humberger__menu__overlay").addClass("active");
    $("body").addClass("over_hid");
  });

  $(".humberger__menu__overlay").on("click", function () {
    $(".humberger__menu__wrapper").removeClass(
      "show__humberger__menu__wrapper"
    );
    $(".humberger__menu__overlay").removeClass("active");
    $("body").removeClass("over_hid");
  });

  /*------------------
		Navigation
	--------------------*/
  // $(".mobile-menu").slicknav({
  //   prependTo: "#mobile-menu-wrap",
  //   allowParentLinks: true,
  // });

  /*-----------------------
        Categories Slider
    ------------------------*/
  $(".categories__slider").owlCarousel({
    loop: true,
    margin: 0,
    items: 4,
    dots: false,
    nav: true,
    navText: [
      "<span class='fa fa-angle-left'><span/>",
      "<span class='fa fa-angle-right'><span/>",
    ],
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
    responsive: {
      0: {
        items: 1,
      },

      480: {
        items: 2,
      },

      768: {
        items: 3,
      },

      992: {
        items: 4,
      },
    },
  });

  $(".hero__categories__all").on("click", function () {
    $(".hero__categories ul").slideToggle(400);
  });

  /*--------------------------
        Latest Product Slider
    ----------------------------*/
  $(".latest-product__slider").owlCarousel({
    loop: true,
    // loop: false,
    margin: 0,
    items: 1,
    dots: false,
    nav: true,
    navText: [
      "<span class='fa fa-angle-left'><span/>",
      "<span class='fa fa-angle-right'><span/>",
    ],
    smartSpeed: 1200,
    autoHeight: false,
    // autoplay: true,
    autoplay: false,
  });

  /*-----------------------------
        Product Discount Slider
    -------------------------------*/
  $(".product__discount__slider").owlCarousel({
    loop: true,
    margin: 0,
    items: 3,
    dots: true,
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
    responsive: {
      320: {
        items: 1,
      },

      480: {
        items: 2,
      },

      768: {
        items: 2,
      },

      992: {
        items: 3,
      },
    },
  });

  /*---------------------------------
        Product Details Pic Slider
    ----------------------------------*/
  $(".product__details__pic__slider").owlCarousel({
    loop: true,
    margin: 20,
    items: 4,
    dots: true,
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
  });

  /*-----------------------
		Price Range Slider
	------------------------ */
  // var rangeSlider = $(".price-range"),
  //   minamount = $("#minamount"),
  //   maxamount = $("#maxamount"),
  //   minPrice = rangeSlider.data("min"),
  //   maxPrice = rangeSlider.data("max");
  // rangeSlider.slider({
  //   range: true,
  //   min: minPrice,
  //   max: maxPrice,
  //   values: [minPrice, maxPrice],
  //   slide: function (event, ui) {
  //     minamount.val("$" + ui.values[0]);
  //     maxamount.val("$" + ui.values[1]);
  //   },
  // });
  // minamount.val("$" + rangeSlider.slider("values", 0));
  // maxamount.val("$" + rangeSlider.slider("values", 1));

  /*--------------------------
        Select
    ----------------------------*/
  // $("select").niceSelect();

  /*------------------
		Single Product
	--------------------*/
  $(".product__details__pic__slider img").on("click", function () {
    var imgurl = $(this).data("imgbigurl");
    var bigImg = $(".product__details__pic__item--large").attr("src");
    if (imgurl != bigImg) {
      $(".product__details__pic__item--large").attr({
        src: imgurl,
      });
    }
  });

  /*-------------------
		Quantity change
	--------------------- */
  var proQty = $(".pro-qty");
  proQty.prepend('<span class="dec qtybtn">-</span>');
  proQty.append('<span class="inc qtybtn">+</span>');
  proQty.on("click", ".qtybtn", function () {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if ($button.hasClass("inc")) {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 0;
      }
    }
    $button.parent().find("input").val(newVal);
  });
})(jQuery);

// filter container script
function filterChanger(changer, typeUrl, itemOptions, changeth) {
  $(document).on("change", changer, function () {
    var item_is_for = $(this).children("option:selected").val();
    // var get_item_type = "yes";
    $.ajax({
      url: typeUrl,
      method: "POST",
      async: false,
      data: {
        itemOptions,
        item_is_for: item_is_for,
      },
      success: function (data) {
        $(changeth).html(data);
      },
    });
  });
}

/**
 * Name : Item Filter
 * @params 1: the event listener element
 * @params 2: the url
 * @params 3: post message for filter
 * @params 4: the changeth
 */
filterChanger(".item-is-for", "ajax-get-item-type.php", "type", ".item-type");
filterChanger(".item-is-for", "ajax-get-item-type.php", "size", ".item-size");

// change country start
$(document).on("change", ".country", function () {
  var country = $(this).children("option:selected").val();
  // var get_item_type = "yes";
  var get_regions = "yes";
  $.ajax({
    url: "ajax-get-country-regions.php",
    method: "POST",
    async: false,
    data: {
      get_regions: get_regions,
      country: country,
    },
    success: function (data) {
      $(".regions").html(data);
    },
  });
});
// change country end



$(".back-btn").click(function () {
  window.history.back();
});

