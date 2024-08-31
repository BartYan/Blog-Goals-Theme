$(document).ready(function () {
  
    $('.carousel').on('init', function(slick) {
        // console.log('fired!');
        $('.carousel').css("opacity","1");
    })
    $('.carousel').slick({
        centerMode: false,
        slidesToShow: 1,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 10000,
        infinite: true,
        lazyLoad: 'ondemand',
        // responsive: [
        //   {
        //     breakpoint: 768,
        //     settings: {
        //       arrows: false,
        //       centerMode: true,
        //       centerPadding: '40px',
        //       slidesToShow: 1
        //     }
        //   },
        //   {
        //     breakpoint: 480,
        //     settings: {
        //       arrows: false,
        //       centerMode: true,
        //       centerPadding: '40px',
        //       slidesToShow: 1
        //     }
        //   }
        // ]
      });
});
