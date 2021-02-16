/* menu */
jQuery(document).ready(function(){
let touchEvent = 'ontouchstart' in window ? 'touchstart' : 'click';
jQuery(".sub-menu a" ).after( "<span class='menu_sub'></span>" );
jQuery(document).on(touchEvent, '.menu_sub', function(){
jQuery(this).toggleClass("open");
jQuery(this).next('ul').slideToggle();
});
});


jQuery(document).ready(function(){
  jQuery(".menu-icon-main").click(function(){
      jQuery(".navigation").slideToggle(300);
      jQuery("body").toggleClass("body-hide");
  });
  
  /* menu */
  
  let touchEvent = 'ontouchstart' in window ? 'touchstart' : 'click';
    jQuery(".menu-item-has-children a" ).after( "<span class='menu_sub'></span>" );
    jQuery(document).on(touchEvent, '.menu_sub', function(){
    jQuery(this).toggleClass("open");
    jQuery(this).next('ul').slideToggle();
  });
  

  /* phone number */
  jQuery('[id^=input_2_2]').keypress(validateNumber);
  jQuery('[id^=input_1_3]').keypress(validateNumber);
});
  
function validateNumber(event) {
  var key = window.event ? event.keyCode : event.which;
  if (event.keyCode === 8 || event.keyCode === 46) {
    return true;
    } else if ( key < 48 || key > 57 ) {
    return false;
    } else {
  return true;
  }
};

$(window).on("scroll", function() {
  if($(window).scrollTop() > 120) {
    $(".header").addClass("sticky");
  } else {
    $(".header").removeClass("sticky");
  }
});

//scroll down

$(function () {
    $('#scroll-bottom').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 500, 'linear');
    });
});