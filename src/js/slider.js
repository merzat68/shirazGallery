import Swiper from "./swiper-bundle.min";

const swiper = new Swiper(".postSlider__caption--container", {
  loop: true,
  effect: "fade",
  fadeEffect: {
    crossFade: true,
  },
  // If we need pagination
  pagination: {
    el: ".postSlider__markdown--container",
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
const swiper__thumbnail = new Swiper(".postSlider__thumbnail--container", {
  loop: true,
  effect: "fade",
  fadeEffect: {
    crossFade: true,
  },
});

swiper.on("slideChange", () => {
  swiper__thumbnail.slideNext();
});
