<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<!-- Demo styles -->
<style>
  :root {
    --swiper-theme-color: #99caff;
  }
  .swiper {
    width: 100%;
    height: 100%;
    margin-left: auto;
    margin-right: auto;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    min-height: 160px;
    object-fit: cover;
  }
</style>
<!-- Swiper -->
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><img src="images/slider/slider25.jpg" class="img-fluid" alt="DoR Slider Image"></div>
    <div class="swiper-slide"><img src="images/slider/slider-11.png" class="img-fluid" alt="DoR Slider Image"></div>
    <div class="swiper-slide"><img src="images/slider/slider-14.png" class="img-fluid" alt="DoR Slider Image"></div>
    <div class="swiper-slide"><img src="images/slider/2.JPG" class="img-fluid" alt="DoR Slider Image"></div>
    <div class="swiper-slide"><img src="images/slider/slider-15.png" class="img-fluid" alt="DoR Slider Image"></div>
    <div class="swiper-slide"><img src="images/slider/slider-16.png" class="img-fluid" alt="DoR Slider Image"></div>
    <div class="swiper-slide"><img src="images/slider/slider-12.png" class="img-fluid" alt="DoR Slider Image"></div>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-pagination"></div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    autoplay: {
      delay: 5000,
    },
    loop: true,
    effect: "fade", // Use "fade" for a simple fade transition
    speed: 1000, // Add this property for smooth transition (in milliseconds)
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
