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

   var swiper = new Swiper(".singleImageSwiper", {
    mousewheel: {
      'forceToAxis': true,
      'invert': false,
    },
    pagination: {
      el: ".swiper-pagination",
    },
  });

  var swiper = new Swiper(".swiperTestimonials", {
    slidesPerView: "auto",
    centeredSlides: true,
    spaceBetween: 30,
    autoplay: {
      delay: 5000
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
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
    $("input:radio").on('click', function() {
      var $box = $(this);
      if ($box.is(":checked")) {
        var group = "input:radio[data-name='" + $box.attr("data-name") + "']";
        $(group).prop("checked", false);
        $box.prop("checked", true);
      } else {
        $box.prop("checked", false);
      }
    });
    
    // Filters show by toggle
  

    $('#showFilters').click(function(){
      $('.product-list-content-filters').toggleClass('active');
      // Set condition to be above 768px
      if($(window).width() > 768){
        if($('.product-list-content-filters').hasClass('active')){
          $('.product-list-content-items').width("68%"); 
        }
        else{
          $('.product-list-content-items').width("100%");
        }
      }
     
    })
    if($('.product-list-content-filters').hasClass('active')){
      $('.product-list-content-items').width("68%"); 
    }
    else{
      $('.product-list-content-items').width("100%");
    }
    

   // Range slide with filters
  

     // Updating the input number with price_slider range

     $(document).ready(function() {
      if (window.location.pathname == '/MyTechOnWebS/products_list'){
        var price_slider = document.querySelector('.price-slider');
        noUiSlider.create(price_slider, {
          start: [0, 5000],
          connect: true,
          step: 10,
          range: {
            'min': 0,
            'max': 5000
          }
        })
        var inputPriceNumberMin = document.getElementById('number_price_min');
        var inputPriceNumberMax = document.getElementById('number_price_max');
        price_slider.noUiSlider.on('update', function(values, handle){
          var value = values[handle];
          if(handle){
            inputPriceNumberMax.value = Math.round(value);
          }
          else{
            inputPriceNumberMin.value = Math.round(value);
          }
        });
        inputPriceNumberMin.addEventListener('change', function(){
          price_slider.noUiSlider.set([this.value, null]);
        });
        inputPriceNumberMax.addEventListener('change', function(){
          price_slider.noUiSlider.set([null, this.value]);
        });

      }
    })

   
   
    // Profile navigation

   $('.profil-navigation a').on('click', function(){
      $('.profil-navigation a').removeClass('active');
      $(this).addClass('active');

      var destination = $(this).attr('href');
      var destination_final = destination.substring(1, destination.length);

      $('.profil-content .active').removeClass('active');
      var content = $('.profil-content').find('div[id='+destination_final+']');
      $(content).addClass('active');

   });

      // Profile accordeon adress

   $(' #adress-cta').on('click', function(){
      var iconCta = $(this).find('i');
      var id = $(this).closest('.profil-content-adresses-item').attr('data-id');
      iconCta.toggleClass('fa-angle-up');
      $('.profil-content-adresses .profil-content-adresses-content .profil-content-adresses-item[data-id=\''+id+'\']').toggleClass('active');
   })

   // Micromodal popup

       


   // Disable form when checking 

   $('.switch input').on('click', function(e){
    $('.check-container-form input:not(.check-container-useadress-switch input)').toggleClass('disabled');
   });
  

 });
