$(document).ready(function() {
  $('.slider').slick({
    dots: true,
    prevArrow: false,
    nextArrow: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 2,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
        slidesToShow: 2,
        slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
        slidesToShow: 2,
        slidesToScroll: 1
        }
      }
    ]
  });
});