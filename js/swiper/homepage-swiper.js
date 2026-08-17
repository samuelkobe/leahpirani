//HERO SWIPER Initialized
const heroSwiper = new Swiper('.swiper-hero', {
  slidesPerView: 1,
  effect: 'fade',
  loop: true,
  autoplay: {
    delay: 5000,
  },
  pagination: {
  el: '.swiper-pagination',
  type: 'bullets',
  clickable: true,
},
});
