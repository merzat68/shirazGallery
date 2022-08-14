import Swiper from "./swiper-bundle.min";

const swiper = new Swiper(".postSlider", {
  loop: true,
  effect: "fade",
  fadeEffect: {
    crossFade: true,
  },
  // If we need pagination
  pagination: {
    el: ".postSlider__markdown",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".postSlider__navigator--right",
    prevEl: ".postSlider__navigator--left",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});
