var count = 2;
setInterval(function () {
  if (count == 1) {
    $(".banner4").hide();
    $(".banner1").show();
    count++;
  } else if (count == 2) {
    $(".banner1").hide();
    $(".banner2").show();
    count++;
  } else if (count == 3) {
    $(".banner2").hide();
    $(".banner3").show();
    count++;
  } else if (count == 4) {
    $(".banner3").hide();
    $(".banner4").show();
    count = 1;
  }
}, 2000);
