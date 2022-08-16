import Swiper from "./swiper-bundle.min";

const swiper = new Swiper(".news__slider", {
  loop: true,

  //centeredSlides: true,
  slidesPerView: 3,
  spaceBetween: 20,
  loopedSlides: 2,
  keyboard: true,
  // If we need pagination
  pagination: {
    el: ".news__markdown",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".news__navigator--right",
    prevEl: ".news__navigator--left",
  },
});
