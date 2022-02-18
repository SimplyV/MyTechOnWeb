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
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  // autoplay: true,
});