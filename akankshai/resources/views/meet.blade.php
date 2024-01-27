<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/meet.css')}}">
    
</head>
<body>
  
  <section class="swiper mySwiper">
    <div class="navb">

      <form method="POST" action="{{ route('logout') }}" >
          @csrf
          <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
              {{ __('Home') }}
          </x-nav-link>
          <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
              {{ __('Take Test') }}
          </x-nav-link>

          <x-nav-link :href="route('profile.edit')">
              {{ __('Profile') }}
          </x-nav-link>
          <x-nav-link :href="route('logout')"
                  onclick="event.preventDefault();
          
                              this.closest('form').submit();">
                              
              {{ __('Log Out') }}
                  
          </x-nav-link>
      </form>
      </div>
    <div class="swiper-wrapper">

      <div class="card swiper-slide">
        <div class="card__image">
          <img src="../assets/MJ.png"alt="card image">
        </div>

        <div class="card__content">
          <span class="card__title">Mayank Jaiswal</span>
          <span class="card__name">Team Lead, Full Stack and AI developer</span>
          <p class="card__text"> Expert in collaborative solutions, merging Full Stack and AI for success.</p>
          <button class="card__btn">View More</button>
        </div>
      </div>

      <div class="card swiper-slide">
        <div class="card__image">
          <img src="../assets/KK.jpeg" alt="card image">
        </div>

        <div class="card__content">
          <span class="card__title">Kshitij Kashyap</span>
          <span class="card__name">Content Lead, Frontend Developer and Designer</span>
          <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore provident non tempora odio est sunt, ipsum</p>
          <button class="card__btn">View More</button>
        </div>
      </div>
      <div class="card swiper-slide">
        <div class="card__image">
          <img src="../assets/HK.png" alt="card image">
        </div>

        <div class="card__content">
          <span class="card__title">Harshita Khare</span>
          <span class="card__name">Frontend Developer and Designer</span>
          <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore provident non tempora odio est sunt, ipsum</p>
          <button class="card__btn">View More</button>
        </div>
      </div>
      <div class="card swiper-slide">
        <div class="card__image">
          <img src="../assets/KS.jpg" alt="card image">
        </div>

        <div class="card__content">
          <span class="card__title">Khushi Sonkusare</span>
          <span class="card__name">Design Lead, Frontend Developer and Designer</span>
          <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore provident non tempora odio est sunt, ipsum</p>
          <button class="card__btn">View More</button>
        </div>
      </div>

      <div class="card swiper-slide">
        <div class="card__image">
          <img src="../assets/BG.svg" alt="card image">
        </div>

        <div class="card__content">
          <span class="card__title">Devesh Pardhi</span>
          <span class="card__name">Backend and AI developer</span>
          <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore provident non tempora odio est sunt, ipsum</p>
          <button class="card__btn">View More</button>
        </div>

      </div>

    </div>
  </section>

<!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
   var swiper = new Swiper(".mySwiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 300,
    modifier: 1,
    slideShadows: false,
  },
  pagination: {
    el: ".swiper-pagination",
  },
  autoplay: {
    delay: 3500, // Set the autoplay delay in milliseconds (3 seconds in this example)
    disableOnInteraction: false, // Set to true if you want to disable autoplay when the user interacts with the swiper
  },
});

    
  </script>

</body>

</html>