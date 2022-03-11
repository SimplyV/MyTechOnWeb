 // Menu mobile

 function showMobileMenu() {
   var x = document.getElementById("mb-container");
   if (x.style.display === "flex") {
     x.style.display = "none";
   } else {
     x.style.display = "flex";
   }
 }

 const options = {
  bottom: '64px', // default: '32px'
  right: '32px', // default: '32px'
  left: 'unset', // default: 'unset'
  time: '0.5s', // default: '0.3s'
  mixColor: '#fff', // default: '#fff'
  backgroundColor: '#FAFAFA',  // default: '#fff'
  buttonColorDark: '#100f2c',  // default: '#100f2c'
  buttonColorLight: '#fff', // default: '#fff'
  saveInCookies: true, // default: true,
  label: '🌓', // default: ''
  autoMatchOsTheme: false, // default: true
}

const darkmode = new Darkmode(options);
darkmode.showWidget();


 jQuery(document).ready(function ($) {

   // Swiper featured products

   var swiper = new Swiper(".featuredSwiper", {
     pagination: {
       el: ".swiper-pagination"
     },
     autoplay: true,
     mousewheel: {
       'forceToAxis': true,
       'invert': false,
     },
   });

   // Swiper popular products

   var swiper = new Swiper(".popularProdSwiper", {
     slidesPerView: 1,
     spaceBetween: 30,
     freeMode: true,
     navigation: {
       nextEl: ".swiper-button-next",
       prevEl: ".swiper-button-prev",
     },
     mousewheel: {
       'forceToAxis': true,
       'invert': false,
     },
     breakpoints: {
       768: {
         slidesPerView: 2
       },
       960: {
         slidesPerView: 3
       },
       1440: {
         slidesPerView: 4
       }
     }
   });

   // Swiper popular categories

   var swiper = new Swiper(".popularCatSwiper", {
     slidesPerView: 1,
     spaceBetween: 30,
     freeMode: true,
     navigation: {
       nextEl: ".swiper-button-next",
       prevEl: ".swiper-button-prev",
     },
     mousewheel: {
       'forceToAxis': true,
       'invert': false,
     },
     breakpoints: {
       768: {
         slidesPerView: 2
       },
       960: {
         slidesPerView: 3
       },
       1440: {
         slidesPerView: 4
       }
     }
   });

   $('#register-form').validate({
     rules: {
       firstname: {
         required: true
       },
       lastname: {
         required: true
       },
       email: {
         required: true,
         email: true
       },
       password: {
         required: true,
         minlength: 6,
         maxlength: 16
       },
       passwordconf: {
         required: true,
         minlength: 6,
         maxlength: 16,
         equalTo: '[name="password"]'
       }
     }
   });

   $('#login-form').validate({
     rules: {
       email: {
         required: true,
         email: true
       },
       password: {
         required: true
       }
     }
   });

   $('#profile-form').validate({
     rules: {
       firstname: {
         required: true
       },
       lastname: {
         required: true
       },
       email: {
         required: true,
         email: true
       },
       street: {
         required: true
       },
       streetnumber: {
         required: true,
         number: true
       },
       city: {
         required: true
       },
       zipcode: {
         required: true,
         number: true
       },
       commune: {
         required: true
       }
     }
   });

   $('#checkout-form').validate({
     rules: {
       street: {
         required: true
       },
       streetnumber: {
         required: true,
         number: true
       },
       city: {
         required: true
       },
       zipcode: {
         required: true,
         number: true
       },
       commune: {
         required: true
       }
     }
   });

   $('#contact-form').validate({
     rules: {
       firstname: {
         required: true
       },
       lastname: {
         required: true
       },
       email: {
         required: true,
         email: true
       },
       message: {
         required: true
       }
     }
   });

  

   // One checkbox at the time 
    $("input:checkbox").on('click', function() {
      var $box = $(this);
      if ($box.is(":checked")) {
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        $(group).prop("checked", false);
        $box.prop("checked", true);
      } else {
        $box.prop("checked", false);
      }
    });

    // Disable form when using profile adress
    $(' .input-name-block').hide();
    $('.check-adress-content .input-email-block').hide();
    $('.check-adress-content .input-street-block').hide();
    $('.check-adress-content .input-adress-block').hide();
    $("#checkbox").click(function(){
      if($(this).is(":checked")){
        $('.check-adress-content .input-name-block').show();
        $('.check-adress-content .input-email-block').show();
        $('.check-adress-content .input-street-block').show();
        $('.check-adress-content .input-adress-block').show();
        $(".check-adress-content .check_form").attr("required", "required");
        $(".check-adress .check-adress-card").hide();

      }
      else{
        $(".check-adress-content .check_form").removeAttr("required");
        $('.check-adress-content .input-name-block').hide();
        $('.check-adress-content .input-email-block').hide();
        $('.check-adress-content .input-street-block').hide();
        $('.check-adress-content .input-adress-block').hide();
        $(".check-adress .check-adress-card").show();
      }
    })
   
   




 });