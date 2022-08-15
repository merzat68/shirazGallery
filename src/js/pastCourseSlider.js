import Swiper from "./swiper-bundle.min";

const swiper = new Swiper(".pastCourse__slider", {
  loop: true,

  //centeredSlides: true,
  slidesPerView: 2,
  spaceBetween: 50,
  keyboard: true,
  // If we need pagination
  pagination: {
    el: ".pastCourse__markdown",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".pastCourse__navigator--right",
    prevEl: ".pastCourse__navigator--left",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});
