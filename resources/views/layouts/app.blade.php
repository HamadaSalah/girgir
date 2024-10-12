
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}" />
    @stack('css')
  </head>
  <body>
    <div class="container-fluid border-bottom">
      <div class="row align-items-center">
        <nav class="navbar navbar-expand-lg col-md-12 col-lg-6">
          <button
            class="navbar-toggler border-0 ms-auto"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse text-center text-lg-start"
            id="navbarNav"
          >
            <a href="{{ Route('home') }}" class="navbar-brand ps-5">
              <img src="{{ asset('imgs') }}/logo.svg" alt="brand logo"
            /></a>
            <ul class="navbar-nav align-items-center">
              <li class="nav-item active px-4 text-nowrap">
                <a class="nav-link home__main p-0" href="{{ Route('home') }}">Home</a>
              </li>
              <li class="nav-item px-4 text-nowrap">
                <a class="nav-link p-0" href="{{ Route('search') }}">Packages</a>
              </li>
              <li class="nav-item px-4 text-nowrap">
                <a class="nav-link p-0" href="{{ Route('providers') }}">Best shops</a>
              </li>
              {{-- <li class="nav-item px-4 text-nowrap">
                <a class="nav-link p-0" href="#vip">Vip</a>
              </li> --}}
              <li class="nav-item px-4 text-nowrap">
                <a class="nav-link p-0" href="{{ Route('providers') }}">Providers</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="col-md-12 col-lg-4 ms-lg-auto text-center text-lg-start">
          <a
            href="#contactus"
            class="text-decoration-none text-black text-opacity-75"
          >
            <img src="{{ asset('imgs') }}/call-calling.svg" alt="contact us" />
            <span>Contact Us</span>
          </a>
          @guest
            <a href="#" class="fm-cairo btn btn-primary py-1 px-3 mx-3"
            ><span><img src="{{ asset('imgs') }}/loginico.svg" alt="login icon" /></span>
            Login</a
            >
            <a
            href="signupuser.html"
            class="fm-cairo btn text-bg-light py-1 px-3"
            >
            <span><img src="{{ asset('imgs') }}/signupico.svg" alt="sign up icon" /></span>
            Sign Up</a
            >
          @endguest
          @auth
            <button class="btn btn-outline-primary border-0 py-1 px-2">
              <img src="{{ asset('imgs') }}/Bell_pin_light.svg" alt="bell pin light">
            </button>
            <button class="btn btn-outline-primary border-0 py-1 px-2">
              <img src="{{ asset('imgs') }}/fav_icon.svg" alt="add to icon">
            </button>
            <button class="btn btn-outline-primary border-0 py-1 px-2">
              <img src="{{ asset('imgs') }}/messagesnavico.svg" alt="messages icon">
            </button>
            <button class="btn btn-outline-primary border-0 py-1 px-2 mb-1">
              <img src="{{ asset('imgs') }}/cartnavico.svg" alt="cart icon">
            </button>
            <button class="btn btn-outline-primary border-0 py-1 px-2 mb-1 settings__btn">
              <img src="{{ asset('imgs') }}/settingnavico.svg" alt="settings icon">
            </button>
          @endauth
        </div>
      </div>
    </div>
    <div class="row align-items-center position-relative">
        {{-- Auth User Coins --}}
      <div class="coinuser">
        <span><img src="{{ asset('imgs/openmoji_coin.png') }}" alt=""> {{ auth()->user()?->coins }} Coin</span>
      </div>
      {{--End auth user coins --}}
      <div class="col-6 d-none d-lg-block">
        <ul class="list-group d-flex flex-row ms-5">
            {{--(LOOPING) Start categories --}}
            @foreach(categories() as $category)
            <li class="list-group-item p-0 border-0">
              <a href="{{ Route('category', $category->id) }}" class="btn px-2 py-3 text-black-50">{{ $category->name }}</a>
            </li>
            @endforeach
            {{-- End categories --}}
        </ul>
      </div>
      <div class="col-lg-5 col-sm-12">
        <form class="form form__nav my-3 me-5">
          <div class="input-group border ms-2 rounded rounded-5">
            <input type="text" class="form-control border-end-0 rounded-start-5 p-2 form__nav--input" placeholder="What is the event?">
            <button class="btn filter p-2">
              <img src="{{ asset('imgs/uil_filter.svg') }}" alt="filter icon">
            </button>
            <button class="btn search p-2">
              <img src="{{ asset('imgs/searchico.svg') }}" alt="search icon">
            </button>
          </div>
        </form>
      </div>
    </div>
    @yield('content')
    <footer>
      <div class="footer-container">
        <div class="footer-logo">
          <h2>
            Gir <img style="width: 30%" src="{{ asset('imgs/Vectorgir.png') }}" alt="" />
            <br />
            Events
          </h2>
        </div>
        <div class="footer-links">
          <div class="footer-section">
            <h4>Legal Information</h4>
            <ul>
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Cookie Policy</a></li>
            </ul>
          </div>
          <div class="footer-section">
            <h4>Navigation Links</h4>
            <ul>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">FAQ</a></li>
            </ul>
          </div>
          @guest
          <div class="footer-section">
            <h4>For Provider</h4>
            <ul>
              <li><a href="#">Join now</a></li>
              <li><a href="#">Sign in</a></li>
            </ul>
          </div>
          @endguest
          <div class="footer-section">
            <h4>Wedding Ideas</h4>
            <ul>
              <li><a href="#">Summer Weddings</a></li>
              <li><a href="#">Real Weddings</a></li>
            </ul>
          </div>
          <div class="footer-section">
            <h4>Birthday Ideas</h4>
            <ul>
              <li><a href="#">Summer Birthdays</a></li>
              <li><a href="#">Real Birthdays</a></li>
            </ul>
          </div>
        </div>
        {{-- Start of Social Media of website --}}
        <div class="footer-social">
          <a href="#"
            ><img src="{{ asset('imgs/Group 1000004623.png') }}" alt="Facebook"
          /></a>
        </div>
        {{-- End of Social Media of website --}}
        <div class="footer-apps">
          <h4>Get the app</h4>
          <a href="#"
            ><img
              src="{{ asset('imgs/app-store.24ce31e7a13056d542d1.png') }}"
              alt="App Store"
          /></a>
          <a href="#"
            ><img
              src="{{ asset('imgs/googleApp.8f241223f55c067c2fb6.png') }}"
              alt="Google Play"
          /></a>
        </div>
      </div>
      <div class="col-12">
        <div class="footer-bottom">
          <p>{{ env('APP_NAME') }}, 2024.</p>
        </div>
      </div>
    </footer>

    <div class="overlay bg-black bg-opacity-50 visually-hidden"></div>
    <div
      class="overlay__content z-3 w-50 position-fixed top-50 start-50 translate-middle visually-hidden"
    >
      <button class="btn text-dark z-3 close position-absolute top-25 end-0">
        <img src="{{ asset('imgs') }}/close.svg" alt="close button" />
      </button>
      <div class="splide progress flex-column bg-white">
        <div class="splide__arrows splide__arrows--ltr">
          <button
            class="splide__arrow splide__arrow--prev arr__prev"
            type="button"
            aria-label="Previous slide"
            aria-controls="splide01-track"
          >
            <img src="{{ asset('imgs') }}/arrleft.svg" alt="button previous" />
          </button>

          <button
            class="splide__arrow splide__arrow--next arr__next btn text-bg-primary rounded-2"
            type="button"
            aria-label="Next slide"
            aria-controls="splide01-track"
          >
            Next
          </button>
        </div>
        <div class="splide__track order-2">
          <ul class="splide__list">
            <li class="splide__slide">
              <div>
                <h3 class="text-dark">What type of event are you hosting?</h3>
                <div class="row justify-content-between mb-2">
                  <div
                    class="col-3 events d-flex flex-column align-items-center bg-gray"
                  >
                    <img src="{{ asset('imgs') }}/wpf_birthday.svg" alt="birthday icon" />
                    <span>Birthday</span>
                  </div>
                  <div
                    class="col-3 events d-flex flex-column align-items-center bg-gray"
                  >
                    <img src="{{ asset('imgs') }}/wpf_wedding-cake.svg" alt="birthday icon" />
                    <span> weddings </span>
                  </div>
                  <div
                    class="col-3 events d-flex flex-column align-items-center bg-gray"
                  >
                    <img src="{{ asset('imgs') }}/cil_child.svg" alt="birthday icon" />
                    <span>New born</span>
                  </div>
                </div>
                <div class="row justify-content-between">
                  <div
                    class="col-3 events d-flex flex-column align-items-center bg-gray"
                  >
                    <img
                      src="{{ asset('imgs') }}/game-icons_engagement-ring.svg"
                      alt="birthday icon"
                    />
                    <span>Engagement</span>
                  </div>
                  <div
                    class="col-3 events d-flex flex-column align-items-center bg-gray"
                  >
                    <img
                      src="{{ asset('imgs') }}/mdi_graduation-cap.svg"
                      alt="birthday icon"
                    />
                    <span>Graduation</span>
                  </div>
                  <div
                    class="col-3 events d-flex flex-column align-items-center bg-gray"
                  >
                    <img
                      src="{{ asset('imgs') }}/hugeicons_corporate.svg"
                      alt="birthday icon"
                    />
                    <span>Corporate Events</span>
                  </div>
                </div>
                <div class="spread_dots my-4 d-flex justify-content-center">
                  <div class="spread_dot bg-primary"></div>
                  <div class="spread_dot bg-gray"></div>
                  <div class="spread_dot bg-gray"></div>
                </div>
                <span class="text-uppercase d-block text-center my-3">or</span>
                <div class="describe my-3">
                  <p class="text-capitalize">describe your event</p>
                  <input
                    type="text"
                    placeholder="I have 20 guests for a birthday party. I want a birthday cake, and I need a clown for the kids."
                    class="form-control bg-gray describe__input"
                  />
                </div>
              </div>
            </li>
            <li class="splide__slide">
              <div>
                <h3 class="text-dark">Estimate the number of guests</h3>

                <div class="container-range--1 position-relative">
                  <div class="range-wrapper position-relative">
                    <div class="circle" id="circle">1</div>
                    <input
                      data-value="1"
                      type="range"
                      min="1"
                      max="500"
                      value="100"
                      class="form-range"
                      id="range"
                    />
                  </div>
                </div>
                <h3 class="text-dark">What is your budget?</h3>
                <div class="container-range--2 position-relative">
                  <div class="range-wrapper position-relative">
                    <div class="circle circle--2" id="circle">1</div>
                    <input
                      type="range"
                      min="100"
                      max="1000"
                      value="200"
                      class="form-range range--2"
                    />
                  </div>
                </div>
              </div>
            </li>
            <li class="splide__slide">
              <div>
                <h3 class="text-dark">Do you have a hall?</h3>
                <div class="d-flex gap-2 hall__container">
                  <button class="hall__input border form-control btn">
                    yes
                  </button>
                  <button class="hall__input border form-control btn">
                    no
                  </button>
                </div>
              </div>
            </li>
            <li class="splide__slide">
              <div class="d-flex flex-column align-items-center">
                <h3 class="text-dark">What vendors are you looking to hire?</h3>
                <div class="row gap-2 px-2 mt-5 w-75 vendours">
                  <button
                    class="btn rounded-5 col border py-1 px-2 text-nowrap"
                  >
                    DJ music
                  </button>
                  <button
                    class="btn py-1 px-2 rounded-5 col border text-nowrap"
                  >
                    a cook
                  </button>
                  <button
                    class="btn py-1 px-2 rounded-5 col border text-nowrap"
                  >
                    Chairs
                  </button>
                  <button
                    class="btn py-1 px-2 rounded-5 col border text-nowrap"
                  >
                    photographer
                  </button>
                  <button
                    class="btn py-1 px-2 rounded-5 col border text-nowrap"
                  >
                    Decorations
                  </button>
                  <button
                    class="btn py-1 px-2 rounded-5 col border text-nowrap"
                  >
                    Flowers
                  </button>
                  <button
                    class="btn py-1 px-2 rounded-5 col border text-nowrap"
                  >
                    Invitation cards
                  </button>
                  <button
                    class="btn py-1 px-2 rounded-5 col border text-nowrap"
                  >
                    Balloons
                  </button>
                  <button
                    class="btn py-1 px-2 rounded-5 col border text-nowrap"
                  >
                    Cake
                  </button>
                  <button
                    class="btn py-1 px-2 rounded-5 col border text-nowrap"
                  >
                    Other
                  </button>
                </div>
              </div>
            </li>
            <li class="splide__slide">
              <div>
                <h3 class="text-dark mb-5">
                  You are in guest mode and not logged in.
                </h3>
                <div class="d-flex flex-column align-items-center">
                  <a
                    href="#"
                    class="btn btn-primary text-white mb-3 d-block rounded-5 text-center w-75"
                    >log in</a
                  >
                  <a
                    href="signupuser.html"
                    class="btn btn-primary text-white mb-3 d-block rounded-5 text-center w-75"
                    >sign up</a
                  >
                </div>
                <div>
                  <p class="lead text-center text-black-50 fw-medium fs-14">
                    You can also log in using your account with:
                  </p>
                  <div class="social__link d-flex justify-content-center gap-3">
                    <a href="#" class="p-2 bg-gray"
                      ><img src="{{ asset('imgs') }}/xico.svg" alt="facebook"
                    /></a>
                    <a href="#" class="p-2 bg-gray"
                      ><img src="{{ asset('imgs') }}/appleico.svg" alt="google"
                    /></a>
                    <a href="#" class="p-2 bg-gray"
                      ><img src="{{ asset('imgs') }}/Google.svg" alt="facebook"
                    /></a>
                    <a href="#" class="p-2 bg-gray"
                      ><img src="{{ asset('imgs') }}/teamsico.svg" alt="google"
                    /></a>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>

        <!-- Add the progress bar element -->
        <div class="my-slider-progress">
          <div class="my-slider-progress-bar"></div>
        </div>
      </div>
    </div>
    <div
      class="overlay__content visually-hidden arrangemet rounded-2 z-3 w-50 position-fixed top-50 start-50 translate-middle bg-white"
    >
      <button
        class="btn close__arrangement text-dark z-3 close position-absolute top-25 end-0"
      >
        <img src="{{ asset('imgs') }}/close.svg" alt="close button" />
      </button>
      <div class="p-3 d-flex flex-column">
        <h3>Arrangment</h3>
        <div class="d-flex justify-content-around">
          <ul
            class="d-flex text-black flex-column gap-2 list-unstyled fm-cairo fs-14 pe-6 border-end"
          >
            <li class="pb-2 border-bottom">
              <span class="right position-relative"
                ><img src="{{ asset('imgs') }}/rightprimary.svg" alt="right check"
              /></span>
              Most requested
            </li>

            <li class="pb-2 border-bottom">
              <span class="right position-relative"
                ><img src="{{ asset('imgs') }}/rightprimary.svg" alt="right check"
              /></span>
              Most rated to least rated
            </li>
            <li class="pb-2 border-bottom">
              <span class="right position-relative"
                ><img src="{{ asset('imgs') }}/rightprimary.svg" alt="right check"
              /></span>
              Lowest rating Highest rating
            </li>
          </ul>
          <div>
            <div>
              <h4>Budget</h4>
              <ul
                class="d-flex text-black align-items-center gap-2 list-unstyled fm-cairo fs-14"
              >
                <li>
                  <span class="right position-relative"
                    ><img src="{{ asset('imgs') }}/rightprimary.svg" alt="right check"
                  /></span>
                  The most
                </li>

                <li>
                  <span class="right position-relative"
                    ><img src="{{ asset('imgs') }}/rightprimary.svg" alt="right check"
                  /></span>
                  The leat
                </li>
              </ul>
            </div>
            <div>
              <h4>Provider Type</h4>
              <ul class="d-flex text-black gap-2 list-unstyled fm-cairo fs-14">
                <li>
                  <span class="right position-relative"
                    ><img src="{{ asset('imgs') }}/rightprimary.svg" alt="right check"
                  /></span>

                  company
                </li>

                <li>
                  <span class="right position-relative"
                    ><img src="{{ asset('imgs') }}/rightprimary.svg" alt="right check"
                  /></span>
                  Individual
                </li>
              </ul>
            </div>
          </div>
        </div>
        <button class="btn btn-primary align-self-end">Go</button>
      </div>
    </div>
@auth
<div class="settings bg-main overflow-scroll">
    <div class="d-flex flex-column align-items-center p-4">
      <button
        class="btn btn-outline-primary border-0 py-1 px-2 mb-1 align-self-end"
      >
        <img
          src="imgs/settingnavico.svg"
          alt="settings icon"
          class="settings__item"
        />
      </button>
      <div>
        <img src="imgs/userimg1.png" alt="user photo" />
      </div>
      <p class="user__name">{{ auth()->user()->name }}</p>
      <p class="user__register_date text-black-50">Registered on {{ auth()->user()->created_at->format('d M') }}</p>
      @if(auth()->user()->type == 'admin')
      <a href="{{route('filament.manage.pages.dashboard')}}" target="_blank"
          class="d-flex justify-content-between align-items-center btn p-2 bg-white shadow rounded-5 mt-3 w-100"
        >
          <div class="d-flex align-items-center">
            <img
              src="imgs/userfill.svg"
              alt="icon"
              class="p-2 bg-gray rounded-5 me-2"
            />
            <span>Manage Website</span>
          </div>
          <span class="me-3 h3 fw-bolder mb-0">&rarr;</span>
      </a>
      @endif
      <a href="amr"
        class="d-flex justify-content-between align-items-center btn p-2 bg-white shadow rounded-5 mt-3 w-100"
      >
        <div class="d-flex align-items-center">
          <img
            src="imgs/userfill.svg"
            alt="icon"
            class="p-2 bg-gray rounded-5 me-2"
          />
          <span>Edit Settings information</span>
        </div>
        <span class="me-3 h3 fw-bolder mb-0">&rarr;</span>
    </a>
      <button
        class="d-flex justify-content-between align-items-center btn p-2 bg-white shadow rounded-5 mt-3 w-100"
      >
        <div class="d-flex align-items-center">
          <img
            src="imgs/heartfill.svg"
            alt="icon"
            class="p-2 bg-gray rounded-5 me-2"
          />
          <span>Favorites</span>
        </div>
        <span class="me-3 h3 fw-bolder mb-0">&rarr;</span>
      </button>
      <button
        class="d-flex justify-content-between align-items-center btn p-2 bg-white shadow rounded-5 mt-3 w-100"
      >
        <div class="d-flex align-items-center">
          <img
            src="imgs/historyfill.svg"
            alt="icon"
            class="p-2 bg-gray rounded-5 me-2"
          />
          <span>My Booking history</span>
        </div>
        <span class="me-3 h3 fw-bolder mb-0">&rarr;</span>
      </button>
      <button
        class="d-flex support__btn justify-content-between align-items-center btn p-2 bg-white shadow rounded-5 mt-3 w-100"
      >
        <div class="d-flex align-items-center support__content">
          <img
            src="imgs/phonefill.svg"
            alt="icon"
            class="p-2 bg-gray rounded-5 me-2"
          />
          <span>Support</span>
        </div>
        <span class="me-3 h3 fw-bolder mb-0">&rarr;</span>
      </button>
      <button
        class="d-flex justify-content-between align-items-center btn p-2 bg-white shadow rounded-5 mt-3 w-100"
      >
        <div class="d-flex align-items-center">
          <img
            src="imgs/ifill.svg"
            alt="icon"
            class="p-2 bg-gray rounded-5 me-2"
          />
          <span>About us</span>
        </div>
        <span class="me-3 h3 fw-bolder mb-0">&rarr;</span>
      </button>
      <button
        class="d-flex justify-content-between align-items-center btn p-2 bg-white shadow rounded-5 mt-3 w-100"
      >
        <div class="d-flex align-items-center">
          <img
            src="imgs/lockfill.svg"
            alt="icon"
            class="p-2 bg-gray rounded-5 me-2"
          />
          <span>Privacy policies</span>
        </div>
        <span class="me-3 h3 fw-bolder mb-0">&rarr;</span>
      </button>
      <button
        class="d-flex justify-content-between align-items-center btn p-2 bg-white shadow rounded-5 mt-3 w-100"
      >
        <div class="d-flex align-items-center">
          <img
            src="imgs/termsfill.svg"
            alt="icon"
            class="p-2 bg-gray rounded-5 me-2"
          />
          <span>Order history</span>
        </div>
        <span class="me-3 h3 fw-bolder mb-0">&rarr;</span>
      </button>
      <button
        class="d-flex justify-content-between align-items-center btn p-2 bg-white shadow rounded-5 mt-3 w-100"
      >
        <div class="d-flex align-items-center">
          <img
            src="imgs/signoutfill.svg"
            alt="icon"
            class="p-2 bg-gray rounded-5 me-2"
          />
          <span>Sign out</span>
        </div>
        <span class="me-3 h3 fw-bolder mb-0">&rarr;</span>
      </button>
    </div>
  </div>
@endauth
    @stack('js')
  </body>
</html>
