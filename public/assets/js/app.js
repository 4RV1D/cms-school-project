function goBack() {
    window.history.back();
}

$(document).ready(function() {
    $("body").fadeIn(2000);
    $(".call-for-action").slideUp().slideDown(2500);
    console.log("hello");
});

$("#scroll").click(function() {
    $('html, body').animate({
        scrollTop: $("#scrollTo").offset().top
    }, 700);
});

$("#hamburger").click(function(){
    $("#menu").toggle();
});

$("#add_sub_category").click(function() {
  var div = document.createElement('ul');

  div.innerHTML = '<li>\
      <input type="text" value=""/><br>\
      <textarea name="desc" rows="8" cols="80" value=""></textarea><br>\
      <input type="button" class="btn" id="delete-btn" value="- Tabort underkategori">\
    </li>';

   document.getElementById('sub_category_form').appendChild(div);
});


$(document).ready(function() {
  $(".trading2").hide();
  $(".misc").hide();
  $(".market").hide();
  $(".case").hide();
  $(".trading").hide();
  $(".betting").show();

  $("#betting-cms").click(function() {

    $(".trading2").hide();
    $(".misc").hide();
    $(".market").hide();
    $(".case").hide();
    $(".trading").hide();
    $(".betting").show();

  });


  $("#case-cms").click(function() {

    $(".trading2").hide();
    $(".misc").hide();
    $(".market").hide();
    $(".betting").hide();
    $(".trading").hide();
    $(".case").show();

  });


  $("#trading-cms").click(function() {

    $(".trading2").hide();
    $(".misc").hide();
    $(".market").hide();
    $(".betting").hide();
    $(".case").hide();
    $(".trading").show();

  });


  $("#trading2-cms").click(function() {

    $(".misc").hide();
    $(".market").hide();
    $(".betting").hide();
    $(".case").hide();
    $(".trading").hide();
    $(".trading2").show();

  });


  $("#market-cms").click(function() {

    $(".trading2").hide();
    $(".misc").hide();
    $(".betting").hide();
    $(".case").hide();
    $(".trading").hide();
    $(".market").show();

  });


  $("#misc-cms").click(function() {

    $(".trading2").hide();
    $(".market").hide();
    $(".betting").hide();
    $(".case").hide();
    $(".trading").hide();
    $(".misc").show();

  });

});
