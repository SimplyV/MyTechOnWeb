// Menu mobile

function showMobileMenu() {
  var x = document.getElementById("mb-container");
  if (x.style.display === "flex") {
    x.style.display = "none";
  } else {
    x.style.display = "flex";
  }
}

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
  breakpoints:{
    768:{
      slidesPerView: 2
    },
    960:{
      slidesPerView: 3
    },
    1440:{
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
  breakpoints:{
    768:{
      slidesPerView: 2
    },
    960:{
      slidesPerView: 3
    },
    1440:{
      slidesPerView: 4
    }
  }
});

// jQuery Validator Form 

jQuery(document).ready(function ($) {

  $('#register-form').validate({
    rules: {
      firstname:{
        required: true
      },
      lastname:{
        required: true
      },
      email:{
        required: true,
        email: true
      },
      password:{
        required: true,
        minlength: 6,
        maxlength: 16
      },
      passwordconf:{
        required: true,
        minlength: 6,
        maxlength: 16,
        equalTo: '[name="password"]'
      }
    }
  });

  $('#login-form').validate({
    rules: {
      email:{
        required: true,
        email: true
      },
      password:{
        required: true
      }
    }
  });

  $('#profile-form').validate({
    rules:{
      firstname:{
        required: true
      },
      lastname:{
        required: true
      },
      email:{
        required: true,
        email: true
      },
      street:{
        required: true
      },
      streetnumber:{
        required: true,
        number: true
      },
      city:{
        required: true
      },
      zipcode:{
        required: true,
        number: true
      },
      commune:{
        required: true
      }
    }
  });

  $('#checkout-form').validate({
    rules:{
      street:{
        required: true
      },
      streetnumber:{
        required: true,
        number: true
      },
      city:{
        required: true
      },
      zipcode:{
        required: true,
        number: true
      },
      commune:{
        required: true
      }
    }
  });

  $('#contact-form').validate({
    rules:{
      firstname:{
        required: true
      },
      lastname:{
        required: true
      },
      email:{
        required: true,
        email: true
      },
      message:{
        required: true
      }
    }
  });
});