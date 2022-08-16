import Swiper from "./swiper-bundle.min";

const swiper = new Swiper(".upcomingEvent__slider", {
  loop: true,

  //centeredSlides: true,
  slidesPerView: 3,
  spaceBetween: 20,
  keyboard: true,
  // If we need pagination
  pagination: {
    el: ".upcomingEvent__markdown",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".upcomingEvent__navigator--right",
    prevEl: ".upcomingEvent__navigator--left",
  },
});
