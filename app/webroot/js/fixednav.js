$(document).ready(function() {
  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 360) {
      $('#nav_barfixed').addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 360) {
      $('#nav_barfixed').removeClass('navbar-fixed');
    }
  });
});



$(document).ready(function() {
  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 360) {
      $('#nav_barfixed2').addClass('navbar-fixed2');
    }
    if ($(window).scrollTop() < 360) {
      $('#nav_barfixed2').removeClass('navbar-fixed2');
    }
  });
});




