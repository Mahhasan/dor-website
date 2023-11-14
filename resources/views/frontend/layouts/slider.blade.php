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
    @foreach($websiteSliders as $websiteSlider)
      @if($websiteSlider->picture)
        <div class="swiper-slide"><img src="{{ asset('uploads/website_slider/' . $websiteSlider->picture) }}" class="img-fluid" alt="DoR Slider Image"></div>
      @else
        There Are No Slider Image
      @endif
    @endforeach
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
