
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} | Home</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
    <link
      href="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
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
            <a href="#" class="navbar-brand ps-5">
              <img src="{{asset('assets/imgs/logo.svg')}}" alt="brand logo"
            /></a>
            <ul class="navbar-nav align-items-center">
              <li class="nav-item active px-4">
                <a class="nav-link home__main" href="#home">Home</a>
              </li>
              <li class="nav-item px-4">
                <a class="nav-link" href="#packages">Packages</a>
              </li>
              <li class="nav-item px-4">
                <a class="nav-link" href="#bestshops">Best shops</a>
              </li>
              <li class="nav-item px-4">
                <a class="nav-link" href="#vip">Vip</a>
              </li>
              <li class="nav-item px-4">
                <a class="nav-link" href="#providers">Providers</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="col-md-12 col-lg-4 ms-lg-auto text-center text-lg-start">
          <a
            href="#contactus"
            class="text-decoration-none text-black text-opacity-75"
          >
            <img src="{{ asset('assets/imgs/call-calling.svg') }}" alt="contact us" />
            <span>Contact Us</span>
          </a>
          @auth
            <button class="btn btn-outline-primary border-0 py-1 px-2">
                <img src="assets/imgs/Bell_pin_light.svg" alt="bell pin light" />
            </button>
            <button class="btn btn-outline-primary border-0 py-1 px-2">
                <img src="assets/imgs/fav_icon.svg" alt="add to icon" />
            </button>
            <a href="{{ route('logout') }}" class="fm-cairo btn btn-primary py-1 px-3 mx-3"
            ><span><img src="assets/imgs/loginico.svg" alt="login icon" /></span>
            {{ auth()->user()->name }}</a
            >
          @else
          <a href="{{ route('login') }}" class="fm-cairo btn btn-primary py-1 px-3 mx-3"
            ><span><img src="assets/imgs/loginico.svg" alt="login icon" /></span>
            Login</a
          >
          <a
            href="{{ route('register') }}"
            class="fm-cairo btn text-bg-light py-1 px-3"
          >
            <span><img src="{{ asset('assets/imgs/signupico.svg') }}" alt="sign up icon" /></span>
            Sign Up</a
          >
          @endauth
        </div>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col-6 d-none d-lg-block">
        <ul class="list-group d-flex flex-row ms-5">
          <li class="list-group-item p-0 border-0">
            <a href="#" class="btn px-2 py-3 text-black-50">weddings</a>
          </li>
          <li class="list-group-item p-0 border-0">
            <a href="#" class="btn px-2 py-3 text-black-50"> Birthday</a>
          </li>
          <li class="list-group-item p-0 border-0">
            <a href="#" class="btn px-2 py-3 text-black-50"> New Born</a>
          </li>
          <li class="list-group-item p-0 border-0">
            <a href="#" class="btn px-2 py-3 text-black-50"> Baby Gender</a>
          </li>

          <li class="list-group-item p-0 border-0">
            <a href="#" class="btn px-2 py-3 text-black-50">Engagment</a>
          </li>
          <li class="list-group-item p-0 border-0">
            <a href="#" class="btn px-2 py-3 text-black-50">Coporate Events</a>
          </li>
          <li class="list-group-item p-0 border-0">
            <a href="#" class="btn px-2 py-3 text-black-50">Gradution</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-5 col-sm-12">
        <form class="form form__nav my-3 me-5">
          <div class="input-group border ms-2 rounded rounded-5">
            <input
              type="text"
              class="form-control border-end-0 rounded-start-5 p-2 form__nav--input"
              placeholder="What is the event?"
            />
            <button class="btn filter p-2">
              <img src="{{ asset('assets/imgs/uil_filter.svg') }}" alt="filter icon" />
            </button>
            <button class="btn search p-2">
              <img src="{{ asset('assets/imgs/searchico.svg') }}" alt="search icon" />
            </button>
          </div>
        </form>
      </div>
    </div>
    <main class="bg-main main__content">
      <section class="hero position-relative mb-9">
        <div>
          <img
            src="{{ asset('assets/imgs/hero.webp') }}"
            alt="hero image"
            class="img-fluid w-100 hero__img"
          />
        </div>
        <div class="dots position-absolute end-0 top-50 translate-middle-y">
          <ul class="d-flex flex-column gap-3 me-4">
            <li class="dot"></li>
            <li class="dot"></li>
            <li class="dot active"></li>
          </ul>
        </div>
        <div
          class="w-50 position-absolute py-1 px-2 py-lg-4 px-lg-6 text-center bottom-0 start-50 bg-white hero__content rounded-3 align-self-center shadow-lg"
        >
          <h1 class="hero__title text-primary">Plan your dream event</h1>
          <p class="hero__text text-center">
            Weddings, galas, birthdays, and beyond Gir Gir events connects you
            with exclusive venues, vendors, and inspiration you won't find
            anywhere else.
          </p>
          <button
            class="btn btn-primary fw-light text-uppercase fs-6 py-1 px-3 start__planning"
          >
            start planning &rarr;
          </button>
        </div>
      </section>
      <section class="most_requested mb-5 position-relative">
        <img
          src="assets/imgs/blue-balloon-png-image-2400.png"
          alt="balloon image"
          class="position-absolute translate-middle-y d-none d-lg-block"
        />
        <div
          class="position-absolute end-0 translate-middle-y d-none d-lg-block"
        >
          <img
            src="assets/imgs/istockphoto-1421941487-612x612-removebg-preview 1.png"
            alt="prize image"
          />
          <img
            src="assets/imgs/istockphoto-1421941487-612x612-removebg-preview 5.png"
            alt="prize image"
          />
        </div>

        <div class="container text-center">
          <h2 class="heading position-relative">Most requested</h2>
          <p class="text-black-50">Here are the most searched packages ever</p>

          <section
            class="splide trinds__slider--two container"
            aria-label="Splide Basic HTML Example"
          >
            <div class="splide__track">
              <ul class="splide__list gap-2">
                <li class="splide__slide">
                  <div
                    class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                  >
                    <img
                      src="assets/imgs/mdi_heart-outline.svg"
                      alt="add to fav"
                      class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                    />

                    <img
                      src="assets/imgs/most1.png"
                      alt="wedding"
                      class="card-img-top"
                    />

                    <div class="card-body px-2 py-4">
                      <div
                        class="d-flex align-items-center justify-content-between mb-2"
                      >
                        <h3 class="card-title h6 fw-bold mb-0">
                          Pink Theme Wedding
                        </h3>
                        <span class="d-block"
                          ><img src="assets/imgs/rating.svg" alt="rating"
                        /></span>
                      </div>
                      <p class="card-text text-black-50 fs-12">
                        <span class="text-black text-opacity-25 fs-14"
                          ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                          kareem evee</span
                        >
                        <br />100 Guests, DJ Muisc, Drinks, Decor
                      </p>
                      <div
                        class="d-flex align-items-center justify-content-between"
                      >
                        <a
                          href="#"
                          class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                          >Discover now</a
                        >
                        <p class="fm-cairo mb-0">
                          from/<span class="text-primary fw-medium">100$</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="splide__slide">
                  <div
                    class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                  >
                    <img
                      src="assets/imgs/mdi_heart-outline.svg"
                      alt="add to fav"
                      class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                    />

                    <img
                      src="assets/imgs/most1.png"
                      alt="wedding"
                      class="card-img-top"
                    />

                    <div class="card-body px-2 py-4">
                      <div
                        class="d-flex align-items-center justify-content-between mb-2"
                      >
                        <h3 class="card-title h6 fw-bold mb-0">
                          Pink Theme Wedding
                        </h3>
                        <span class="d-block"
                          ><img src="assets/imgs/rating.svg" alt="rating"
                        /></span>
                      </div>
                      <p class="card-text text-black-50 fs-12">
                        <span class="text-black text-opacity-25 fs-14"
                          ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                          kareem evee</span
                        >
                        <br />100 Guests, DJ Muisc, Drinks, Decor
                      </p>
                      <div
                        class="d-flex align-items-center justify-content-between"
                      >
                        <a
                          href="#"
                          class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                          >Discover now</a
                        >
                        <p class="fm-cairo mb-0">
                          from/<span class="text-primary fw-medium">100$</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="splide__slide">
                  <div
                    class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                  >
                    <img
                      src="assets/imgs/mdi_heart-outline.svg"
                      alt="add to fav"
                      class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                    />

                    <img
                      src="assets/imgs/most1.png"
                      alt="wedding"
                      class="card-img-top"
                    />

                    <div class="card-body px-2 py-4">
                      <div
                        class="d-flex align-items-center justify-content-between mb-2"
                      >
                        <h3 class="card-title h6 fw-bold mb-0">
                          Pink Theme Wedding
                        </h3>
                        <span class="d-block"
                          ><img src="assets/imgs/rating.svg" alt="rating"
                        /></span>
                      </div>
                      <p class="card-text text-black-50 fs-12">
                        <span class="text-black text-opacity-25 fs-14"
                          ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                          kareem evee</span
                        >
                        <br />100 Guests, DJ Muisc, Drinks, Decor
                      </p>
                      <div
                        class="d-flex align-items-center justify-content-between"
                      >
                        <a
                          href="#"
                          class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                          >Discover now</a
                        >
                        <p class="fm-cairo mb-0">
                          from/<span class="text-primary fw-medium">100$</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="splide__slide">
                  <div
                    class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                  >
                    <img
                      src="assets/imgs/mdi_heart-outline.svg"
                      alt="add to fav"
                      class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                    />

                    <img
                      src="assets/imgs/most1.png"
                      alt="wedding"
                      class="card-img-top"
                    />

                    <div class="card-body px-2 py-4">
                      <div
                        class="d-flex align-items-center justify-content-between mb-2"
                      >
                        <h3 class="card-title h6 fw-bold mb-0">
                          Pink Theme Wedding
                        </h3>
                        <span class="d-block"
                          ><img src="assets/imgs/rating.svg" alt="rating"
                        /></span>
                      </div>
                      <p class="card-text text-black-50 fs-12">
                        <span class="text-black text-opacity-25 fs-14"
                          ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                          kareem evee</span
                        >
                        <br />100 Guests, DJ Muisc, Drinks, Decor
                      </p>
                      <div
                        class="d-flex align-items-center justify-content-between"
                      >
                        <a
                          href="#"
                          class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                          >Discover now</a
                        >
                        <p class="fm-cairo mb-0">
                          from/<span class="text-primary fw-medium">100$</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </section>
          <button class="btn btn-primary fw-light py-1 px-3">
            Find out more &rarr;
          </button>
        </div>
      </section>
      <section class="wedding p-2 mt-5 mb-6 position-relative">
        <div
          class="position-absolute mb-4 d-flex gap-2 bottom-0 start-50 translate-middle-y"
        >
          <span class="line bg-primary"></span>
          <span class="line bg-white"></span><span class="line bg-white"></span>
        </div>
        <div class="container mt-6">
          <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex flex-column">
              <h2 class="text-white display-6 fw-medium">Wedding packages</h2>
              <ul
                class="d-flex flex-column gap-2 text-white list-unstyled fm-cairo fs-14"
              >
                <li>
                  <span class="right position-relative"
                    ><img src="assets/imgs/rightprimary.svg" alt="right check"
                  /></span>
                  DJ and Music
                </li>

                <li>
                  <span class="right position-relative"
                    ><img src="assets/imgs/rightprimary.svg" alt="right check"
                  /></span>
                  Balloons and Decorations
                </li>
                <li>
                  <span class="right position-relative"
                    ><img src="assets/imgs/rightprimary.svg" alt="right check"
                  /></span>
                  Cake and Sweets
                </li>
                <li>
                  <span class="right position-relative"
                    ><img src="assets/imgs/rightprimary.svg" alt="right check"
                  /></span>
                  Food and Drinks
                </li>
                <li>
                  <span class="right position-relative"
                    ><img src="assets/imgs/rightprimary.svg" alt="right check"
                  /></span>
                  Party Favors
                </li>
              </ul>
              <p class="text-white fm-cairo fw-medium">
                providers: sick rose compay <br />
                sates from: 100.3 $
              </p>

              <button
                class="align-self-center mb-4 btn btn-primary rounded-5 fm-cairo py-2 px-5"
              >
                order now
              </button>
            </div>
            <div>
              <img src="assets/imgs/party.webp" alt="party" class="img-fluid" />
            </div>
          </div>
        </div>
      </section>
      <section class="best_shop mb-6 position-relative">
        <!-- <img
        src="imgs/arr-left.svg"
        alt="arrow left"
        class="position-absolute arr-left"
      />
      <img
        src="imgs/arr-right.svg"
        alt="arrow right"
        class="position-absolute arr-right"
      /> -->

        <div class="container text-center">
          <h2 class="heading position-relative">Best shops</h2>
          <p class="text-black-50">
            Here are the best-selling stores for wedding and birthday packages
          </p>

          <section
            class="splide trinds__slider--three container"
            aria-label="Splide Basic HTML Example"
          >
            <div class="splide__track">
              <ul class="splide__list gap-2">
                <li class="splide__slide">
                  <div
                    class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                  >
                    <img
                      src="assets/imgs/straightromhear.png"
                      alt="add to fav"
                      class="border border-4 border-white rounded-5 position-absolute top-54 start-50 translate-middle"
                    />

                    <img
                      src="assets/imgs/best1.webp"
                      alt="wedding"
                      class="card-img-top"
                    />

                    <div class="card-body d-flex flex-column px-2 py-2">
                      <div
                        class="d-flex align-items-center justify-content-between mb-2"
                      >
                        <h3 class="card-title h6 fw-bold mb-0 mt-4">
                          Pink Theme Wedding
                        </h3>
                        <span class="d-block"
                          ><img src="assets/imgs/rating.svg" alt="rating"
                        /></span>
                      </div>
                      <p class="card-text text-black-50 fs-12">
                        <span class="text-black fs-6"
                          ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                          kareem evee</span
                        >
                      </p>
                      <div class="d-flex justify-content-between">
                        <p class="fs-10">
                          <span
                            ><img src="assets/imgs/clockico.svg" alt="clock icon"
                          /></span>
                          <span class="text-primary fm-cairo">Closed now</span>
                        </p>
                        <p class="fs-10">
                          <span
                            ><img src="assets/imgs/mapico.svg" alt="map icon"
                          /></span>
                          <span class="text-black fm-cairo"
                            >Dubai Mall next to Dubai</span
                          >
                        </p>
                      </div>
                      <a
                        href="#"
                        class="btn btn-primary fm-cairo py-1 px-2 rounded-3 align-self-center"
                        >Browse now</a
                      >
                    </div>
                  </div>
                </li>
                <li class="splide__slide">
                  <div
                    class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                  >
                    <img
                      src="assets/imgs/straightromhear.png"
                      alt="add to fav"
                      class="border border-4 border-white rounded-5 position-absolute top-54 start-50 translate-middle"
                    />

                    <img
                      src="assets/imgs/best2.webp"
                      alt="wedding"
                      class="card-img-top"
                    />

                    <div class="card-body d-flex flex-column px-2 py-2">
                      <div
                        class="d-flex align-items-center justify-content-between mb-2"
                      >
                        <h3 class="card-title h6 fw-bold mb-0 mt-4">
                          Pink Theme Wedding
                        </h3>
                        <span class="d-block"
                          ><img src="assets/imgs/rating.svg" alt="rating"
                        /></span>
                      </div>
                      <p class="card-text text-black-50 fs-12">
                        <span class="text-black fs-6"
                          ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                          kareem evee</span
                        >
                      </p>
                      <div class="d-flex justify-content-between">
                        <p class="fs-10">
                          <span
                            ><img src="assets/imgs/clockico.svg" alt="clock icon"
                          /></span>
                          <span class="text-primary fm-cairo">Closed now</span>
                        </p>
                        <p class="fs-10">
                          <span
                            ><img src="assets/imgs/mapico.svg" alt="map icon"
                          /></span>
                          <span class="text-black fm-cairo"
                            >Dubai Mall next to Dubai</span
                          >
                        </p>
                      </div>
                      <a
                        href="#"
                        class="btn btn-primary fm-cairo py-1 px-2 rounded-3 align-self-center"
                        >Browse now</a
                      >
                    </div>
                  </div>
                </li>
                <li class="splide__slide">
                  <div
                    class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                  >
                    <img
                      src="assets/imgs/straightromhear.png"
                      alt="add to fav"
                      class="border border-4 border-white rounded-5 position-absolute top-54 start-50 translate-middle"
                    />

                    <img
                      src="assets/imgs/best2.webp"
                      alt="wedding"
                      class="card-img-top"
                    />

                    <div class="card-body d-flex flex-column px-2 py-2">
                      <div
                        class="d-flex align-items-center justify-content-between mb-2"
                      >
                        <h3 class="card-title h6 fw-bold mb-0 mt-4">
                          Pink Theme Wedding
                        </h3>
                        <span class="d-block"
                          ><img src="assets/imgs/rating.svg" alt="rating"
                        /></span>
                      </div>
                      <p class="card-text text-black-50 fs-12">
                        <span class="text-black fs-6"
                          ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                          kareem evee</span
                        >
                      </p>
                      <div class="d-flex justify-content-between">
                        <p class="fs-10">
                          <span
                            ><img src="assets/imgs/clockico.svg" alt="clock icon"
                          /></span>
                          <span class="text-primary fm-cairo">Closed now</span>
                        </p>
                        <p class="fs-10">
                          <span
                            ><img src="assets/imgs/mapico.svg" alt="map icon"
                          /></span>
                          <span class="text-black fm-cairo"
                            >Dubai Mall next to Dubai</span
                          >
                        </p>
                      </div>
                      <a
                        href="#"
                        class="btn btn-primary fm-cairo py-1 px-2 rounded-3 align-self-center"
                        >Browse now</a
                      >
                    </div>
                  </div>
                </li>
                <li class="splide__slide">
                  <div
                    class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                  >
                    <img
                      src="assets/imgs/straightromhear.png"
                      alt="add to fav"
                      class="border border-4 border-white rounded-5 position-absolute top-54 start-50 translate-middle"
                    />

                    <img
                      src="assets/imgs/best2.webp"
                      alt="wedding"
                      class="card-img-top"
                    />

                    <div class="card-body d-flex flex-column px-2 py-2">
                      <div
                        class="d-flex align-items-center justify-content-between mb-2"
                      >
                        <h3 class="card-title h6 fw-bold mb-0 mt-4">
                          Pink Theme Wedding
                        </h3>
                        <span class="d-block"
                          ><img src="assets/imgs/rating.svg" alt="rating"
                        /></span>
                      </div>
                      <p class="card-text text-black-50 fs-12">
                        <span class="text-black fs-6"
                          ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                          kareem evee</span
                        >
                      </p>
                      <div class="d-flex justify-content-between">
                        <p class="fs-10">
                          <span
                            ><img src="assets/imgs/clockico.svg" alt="clock icon"
                          /></span>
                          <span class="text-primary fm-cairo">Closed now</span>
                        </p>
                        <p class="fs-10">
                          <span
                            ><img src="assets/imgs/mapico.svg" alt="map icon"
                          /></span>
                          <span class="text-black fm-cairo"
                            >Dubai Mall next to Dubai</span
                          >
                        </p>
                      </div>
                      <a
                        href="#"
                        class="btn btn-primary fm-cairo py-1 px-2 rounded-3 align-self-center"
                        >Browse now</a
                      >
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </section>

          <button class="btn btn-primary fw-light py-1 px-3">
            Find out more &rarr;
          </button>
        </div>
      </section>

      <section class="trinds mb-6 position-relative">
        <div class="container text-center">
          <h2 class="heading position-relative">Trinds</h2>
          <p class="text-black-50">
            Best Birthday and Graduation Package Themes
          </p>
          <section
            class="splide trinds__slider--one container"
            aria-label="Splide Basic HTML Example"
          >
            <div class="splide__track">
              <ul class="splide__list gap-2">
                <li class="splide__slide">
                  <div class="mb-3 position-relative">
                    <img
                      src="assets/imgs/trinds1.webp"
                      alt="birthday party"
                      class="img-fluid"
                    />
                    <div
                      class="bg-white mb-3 rounded-2 p-2 position-absolute start-50 bottom-0 translate-middle-x w-90"
                    >
                      <h5 class="text-black fw-medium fm-cairo ls-5 text-start">
                        British Flag Theme Party
                      </h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <span class="fm-cairo fs-10"
                            ><img
                              src="assets/imgs/union-1.svg"
                              alt="union icon"
                              class="me-1"
                            />providers:</span
                          >
                          <a
                            href="#"
                            class="btn text-black p-1 text-decoration-underline fs-14 fw-medium fm-cairo"
                            >sick rose</a
                          >
                        </div>
                        <div class="d-flex align-items-center">
                          <span class="fm-cairo fs-10"
                            ><img
                              src="assets/imgs/solar_dollar-bold.svg"
                              alt="union icon"
                              class="me-1"
                          /></span>
                          <p class="cost fm-cairo fs-12 fw-light mb-0">
                            Cost 1000$
                          </p>
                        </div>
                        <div class="d-flex align-items-center">
                          <span class="fm-cairo fs-10"
                            ><img
                              src="assets/imgs/star.svg"
                              alt="union icon"
                              class="me-1 rounded-5 bg-black p-1"
                          /></span>
                          <p class="cost fm-cairo fs-12 fw-light mb-0">
                            rating 4.9
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </section>
          <div class="d-flex justify-content-end">
            <button class="btn btn-primary fw-light py-1 px-3 mt-4">
              Find out more &rarr;
            </button>
          </div>
        </div>
      </section>

      <section class="robot">
        <div class="container d-flex flex-column align-items-center">
          <h2 class="text-black mt-7 mb-5">
            Let AI help you find amazing ideas for your event !!
          </h2>

          <div class="d-flex">
            <img
              src="assets/imgs/robot.png"
              alt="ai assistant"
              class="robot__img position-relative"
            />
            <div>
              <h4 class="text-primary">Let me help you.</h4>
              <p class="text-black-50">
                What is your event, and how many people will be attending?
              </p>
              <input
                type="text"
                class="form-control bg-white py-sm-0 px-sm-0 py-lg-4 px-lg-2 bg-opacity-50 w-165"
                placeholder="I have 20 guests for a birthday party. I want a birthday cake, and I need a clown for the kids."
              />
            </div>
          </div>
        </div>
      </section>
    </main>

    <section class="search__results bg-main d-none">
      <div class="container mt-4">
        <div class="routing d-flex align-items-center">
          <a href="#" class="text-black fs-10 me-2 fw-light home__main">Home</a>
          <span class="text-black">-</span>
          <a href="#" class="text-black fs-10 ms-2 fw-light">Search Filter</a>
        </div>
        <h3 class="mt-3 mb-5 me-2 h1">Search results</h3>
        <div
          class="d-flex justify-content-between border-bottom pb-2 mb-4 search__content position-relative"
        >
          <div class="d-flex align-items-center">
            <label for="#type" class="service__label">Service Provider :</label>
            <select
              id="type"
              name="type"
              id="type"
              class="form-select border-0 text-black-50 bg-main"
            >
              <option value="Individual providers">
                Individual service providers
              </option>
              <option value="Company providers" selected>
                Company service providers
              </option>
              <option value="user">User</option>
            </select>
          </div>
          <button class="btn">
            <img src="{{ asset('assets/imgs/filterlogo.svg') }}" alt="filter" class="img-fluid" />
          </button>
        </div>
        <div class="row gap-4 justify-content-center">
          <div
            class="col-lg-5 flex-column flex-lg-row card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5 flex-row"
          >
            <img
              src="assets/imgs/mdi_heart-outline.svg"
              alt="add to fav"
              class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute add__tofav mt-3"
            />

            <img
              src="assets/imgs/most1.png"
              alt="wedding"
              class="card-img-top img-fluid rounded-3"
            />

            <div class="card-body rounded-5 px-4 py-2 bg-white">
              <div
                class="d-flex align-items-center justify-content-between mb-2"
              >
                <h3 class="card-title h6 fw-bold mb-0">Pink Theme Wedding</h3>
                <span class="d-block"
                  ><img src="assets/imgs/rating.svg" alt="rating"
                /></span>
              </div>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Name shop :
                <span class="text-secondary text-black-50"> kareem evee </span>
              </p>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Details :
                <span class="text-secondary text-black-50">
                  100 Guests , DJ Muisc , Drinks , Decor 100 Guests , DJ Muisc ,
                  Drinks , Decor 100 Guests , DJ Muisc , Drinks , Decor
                </span>
              </p>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Provider Type :
                <span class="text-secondary text-black-50"> Company </span>
              </p>
              <p class="fm-cairo mb-0">
                from/<span class="text-primary fw-medium">100$</span>
              </p>
              <div class="d-flex align-items-center justify-content-end gap-2">
                <a href="#" class="btn btn-primary fm-cairo py-1 px-5 rounded-2"
                  >Edit</a
                >
                <a href="#" class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                  >Discover now</a
                >
              </div>
            </div>
          </div>
          <div
            class="col-lg-5 flex-column flex-lg-row card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5 flex-row"
          >
            <img
              src="assets/imgs/mdi_heart-outline.svg"
              alt="add to fav"
              class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute add__tofav mt-3"
            />

            <img
              src="assets/imgs/most1.png"
              alt="wedding"
              class="card-img-top img-fluid rounded-3"
            />

            <div class="card-body rounded-5 px-4 py-2 bg-white">
              <div
                class="d-flex align-items-center justify-content-between mb-2"
              >
                <h3 class="card-title h6 fw-bold mb-0">Pink Theme Wedding</h3>
                <span class="d-block"
                  ><img src="assets/imgs/rating.svg" alt="rating"
                /></span>
              </div>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Name shop :
                <span class="text-secondary text-black-50"> kareem evee </span>
              </p>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Details :
                <span class="text-secondary text-black-50">
                  100 Guests , DJ Muisc , Drinks , Decor 100 Guests , DJ Muisc ,
                  Drinks , Decor 100 Guests , DJ Muisc , Drinks , Decor
                </span>
              </p>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Provider Type :
                <span class="text-secondary text-black-50"> Company </span>
              </p>
              <p class="fm-cairo mb-0">
                from/<span class="text-primary fw-medium">100$</span>
              </p>
              <div class="d-flex align-items-center justify-content-end gap-2">
                <a href="#" class="btn btn-primary fm-cairo py-1 px-5 rounded-2"
                  >Edit</a
                >
                <a href="#" class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                  >Discover now</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="row gap-4 justify-content-center">
          <div
            class="col-lg-5 flex-column flex-lg-row card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5 flex-row"
          >
            <img
              src="assets/imgs/mdi_heart-outline.svg"
              alt="add to fav"
              class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute add__tofav mt-3"
            />

            <img
              src="assets/imgs/most1.png"
              alt="wedding"
              class="card-img-top img-fluid rounded-3"
            />

            <div class="card-body rounded-5 px-4 py-2 bg-white">
              <div
                class="d-flex align-items-center justify-content-between mb-2"
              >
                <h3 class="card-title h6 fw-bold mb-0">Pink Theme Wedding</h3>
                <span class="d-block"
                  ><img src="assets/imgs/rating.svg" alt="rating"
                /></span>
              </div>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Name shop :
                <span class="text-secondary text-black-50"> kareem evee </span>
              </p>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Details :
                <span class="text-secondary text-black-50">
                  100 Guests , DJ Muisc , Drinks , Decor 100 Guests , DJ Muisc ,
                  Drinks , Decor 100 Guests , DJ Muisc , Drinks , Decor
                </span>
              </p>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Provider Type :
                <span class="text-secondary text-black-50"> Company </span>
              </p>
              <p class="fm-cairo mb-0">
                from/<span class="text-primary fw-medium">100$</span>
              </p>
              <div class="d-flex align-items-center justify-content-end gap-2">
                <a href="#" class="btn btn-primary fm-cairo py-1 px-5 rounded-2"
                  >Edit</a
                >
                <a href="#" class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                  >Discover now</a
                >
              </div>
            </div>
          </div>
          <div
            class="col-lg-5 flex-column flex-lg-row card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5 flex-row"
          >
            <img
              src="assets/imgs/mdi_heart-outline.svg"
              alt="add to fav"
              class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute add__tofav mt-3"
            />

            <img
              src="assets/imgs/most1.png"
              alt="wedding"
              class="card-img-top img-fluid rounded-3"
            />

            <div class="card-body rounded-5 px-4 py-2 bg-white">
              <div
                class="d-flex align-items-center justify-content-between mb-2"
              >
                <h3 class="card-title h6 fw-bold mb-0">Pink Theme Wedding</h3>
                <span class="d-block"
                  ><img src="assets/imgs/rating.svg" alt="rating"
                /></span>
              </div>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Name shop :
                <span class="text-secondary text-black-50"> kareem evee </span>
              </p>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Details :
                <span class="text-secondary text-black-50">
                  100 Guests , DJ Muisc , Drinks , Decor 100 Guests , DJ Muisc ,
                  Drinks , Decor 100 Guests , DJ Muisc , Drinks , Decor
                </span>
              </p>
              <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                Provider Type :
                <span class="text-secondary text-black-50"> Company </span>
              </p>
              <p class="fm-cairo mb-0">
                from/<span class="text-primary fw-medium">100$</span>
              </p>
              <div class="d-flex align-items-center justify-content-end gap-2">
                <a href="#" class="btn btn-primary fm-cairo py-1 px-5 rounded-2"
                  >Edit</a
                >
                <a href="#" class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                  >Discover now</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <button class="btn btn-primary fw-light py-1 px-3 mb-5 text-center">
            Find out more &rarr;
          </button>
        </div>
        <h5 class="pb-4 border-bottom mb-3 position-relative services__heading">
          services
        </h5>
        <section
          class="splide services__slider--one container"
          aria-label="Splide Basic HTML Example"
        >
          <div class="splide__track">
            <ul class="splide__list gap-2">
              <li class="splide__slide">
                <div
                  class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                >
                  <img
                    src="assets/imgs/mdi_heart-outline.svg"
                    alt="add to fav"
                    class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                  />

                  <img
                    src="assets/imgs/most1.png"
                    alt="wedding"
                    class="card-img-top"
                  />

                  <div class="card-body px-2 py-3">
                    <div
                      class="d-flex align-items-center justify-content-between mb-2"
                    >
                      <h3 class="card-title h6 fw-bold mb-0">100 Ballons</h3>
                      <span class="d-block"
                        ><img src="assets/imgs/rating.svg" alt="rating"
                      /></span>
                    </div>
                    <p
                      class="card-text text-black-50 fs-12 d-flex align-items-center mb-2"
                    >
                      <span
                        class="text-black text-opacity-25 fs-14 d-flex align-items-center"
                        ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                      </span>
                      kareem evee
                    </p>
                    <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                      Provider Type :
                      <span class="text-secondary text-black-50">
                        Company
                      </span>
                    </p>
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <a
                        href="#"
                        class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                        >+ add your package</a
                      >
                      <p class="fm-cairo mb-0">
                        from/<span class="text-primary fw-medium">100$</span>
                      </p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="splide__slide">
                <div
                  class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                >
                  <img
                    src="assets/imgs/mdi_heart-outline.svg"
                    alt="add to fav"
                    class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                  />

                  <img
                    src="assets/imgs/most1.png"
                    alt="wedding"
                    class="card-img-top"
                  />

                  <div class="card-body px-2 py-3">
                    <div
                      class="d-flex align-items-center justify-content-between mb-2"
                    >
                      <h3 class="card-title h6 fw-bold mb-0">100 Ballons</h3>
                      <span class="d-block"
                        ><img src="assets/imgs/rating.svg" alt="rating"
                      /></span>
                    </div>
                    <p
                      class="card-text text-black-50 fs-12 d-flex align-items-center mb-2"
                    >
                      <span
                        class="text-black text-opacity-25 fs-14 d-flex align-items-center"
                        ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                      </span>
                      kareem evee
                    </p>
                    <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                      Provider Type :
                      <span class="text-secondary text-black-50">
                        Company
                      </span>
                    </p>
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <a
                        href="#"
                        class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                        >+ add your package</a
                      >
                      <p class="fm-cairo mb-0">
                        from/<span class="text-primary fw-medium">100$</span>
                      </p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="splide__slide">
                <div
                  class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                >
                  <img
                    src="assets/imgs/mdi_heart-outline.svg"
                    alt="add to fav"
                    class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                  />

                  <img
                    src="assets/imgs/most1.png"
                    alt="wedding"
                    class="card-img-top"
                  />

                  <div class="card-body px-2 py-3">
                    <div
                      class="d-flex align-items-center justify-content-between mb-2"
                    >
                      <h3 class="card-title h6 fw-bold mb-0">100 Ballons</h3>
                      <span class="d-block"
                        ><img src="assets/imgs/rating.svg" alt="rating"
                      /></span>
                    </div>
                    <p
                      class="card-text text-black-50 fs-12 d-flex align-items-center mb-2"
                    >
                      <span
                        class="text-black text-opacity-25 fs-14 d-flex align-items-center"
                        ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                      </span>
                      kareem evee
                    </p>
                    <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                      Provider Type :
                      <span class="text-secondary text-black-50">
                        Company
                      </span>
                    </p>
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <a
                        href="#"
                        class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                        >+ add your package</a
                      >
                      <p class="fm-cairo mb-0">
                        from/<span class="text-primary fw-medium">100$</span>
                      </p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="splide__slide">
                <div
                  class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                >
                  <img
                    src="assets/imgs/mdi_heart-outline.svg"
                    alt="add to fav"
                    class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                  />

                  <img
                    src="assets/imgs/most1.png"
                    alt="wedding"
                    class="card-img-top"
                  />

                  <div class="card-body px-2 py-3">
                    <div
                      class="d-flex align-items-center justify-content-between mb-2"
                    >
                      <h3 class="card-title h6 fw-bold mb-0">100 Ballons</h3>
                      <span class="d-block"
                        ><img src="assets/imgs/rating.svg" alt="rating"
                      /></span>
                    </div>
                    <p
                      class="card-text text-black-50 fs-12 d-flex align-items-center mb-2"
                    >
                      <span
                        class="text-black text-opacity-25 fs-14 d-flex align-items-center"
                        ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                      </span>
                      kareem evee
                    </p>
                    <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                      Provider Type :
                      <span class="text-secondary text-black-50">
                        Company
                      </span>
                    </p>
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <a
                        href="#"
                        class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                        >+ add your package</a
                      >
                      <p class="fm-cairo mb-0">
                        from/<span class="text-primary fw-medium">100$</span>
                      </p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="splide__slide">
                <div
                  class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                >
                  <img
                    src="assets/imgs/mdi_heart-outline.svg"
                    alt="add to fav"
                    class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                  />

                  <img
                    src="assets/imgs/most1.png"
                    alt="wedding"
                    class="card-img-top"
                  />

                  <div class="card-body px-2 py-3">
                    <div
                      class="d-flex align-items-center justify-content-between mb-2"
                    >
                      <h3 class="card-title h6 fw-bold mb-0">100 Ballons</h3>
                      <span class="d-block"
                        ><img src="assets/imgs/rating.svg" alt="rating"
                      /></span>
                    </div>
                    <p
                      class="card-text text-black-50 fs-12 d-flex align-items-center mb-2"
                    >
                      <span
                        class="text-black text-opacity-25 fs-14 d-flex align-items-center"
                        ><img src="assets/imgs/houseico.svg" alt="icon" /> Shop :
                      </span>
                      kareem evee
                    </p>
                    <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                      Provider Type :
                      <span class="text-secondary text-black-50">
                        Company
                      </span>
                    </p>
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <a
                        href="#"
                        class="btn btn-primary fm-cairo py-1 px-2 rounded-2"
                        >+ add your package</a
                      >
                      <p class="fm-cairo mb-0">
                        from/<span class="text-primary fw-medium">100$</span>
                      </p>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </section>
      </div>
    </section>

    <section class="search__empty bg-main d-none">
      <div class="container">
        <div class="routing d-flex align-items-center"></div>
        <a href="#" class="text-black fs-10 me-2 fw-light home__main">Home</a>
        <span class="text-black">-</span>
        <a href="#" class="text-black fs-10 ms-2 fw-light">Search Filter</a>
        <h3 class="mt-3 mb-5 me-2 h1">Search results</h3>
        <p class="fm-cairo">
          search :
          <span class="search__message text-decoration-underline text-black-50"
            >birthday32</span
          >
        </p>
        <div class="d-flex flex-column align-items-center">
          <img src="assets/imgs/cart.png" alt="cart image" />
          <p class="mr-neg-3 mt-4">No data</p>
        </div>
      </div>
    </section>

    <footer>
      <div class="footer-container">
        <div class="footer-logo">
          <h2>
            Gir <img style="width: 30%" src="assets/imgs/Vectorgir.png" alt="" />
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
          <div class="footer-section">
            <h4>For Provider</h4>
            <ul>
              <li><a href="#">Join now</a></li>
              <li><a href="#">Sign in</a></li>
            </ul>
          </div>
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
        <div class="footer-social">
          <a href="#"
            ><img src="assets/imgs/Group 1000004623.png" alt="Facebook"
          /></a>
        </div>
        <div class="footer-apps">
          <h4>Get the app</h4>
          <a href="#"
            ><img
              src="assets/imgs/app-store.24ce31e7a13056d542d1.png"
              alt="App Store"
          /></a>
          <a href="#"
            ><img
              src="assets/imgs/googleApp.8f241223f55c067c2fb6.png"
              alt="Google Play"
          /></a>
        </div>
      </div>
      <div class="col-12">
        <div class="footer-bottom">
          <p>Company, 2024.</p>
        </div>
      </div>
    </footer>

    <div class="overlay bg-black bg-opacity-50 visually-hidden"></div>
    <div
      class="overlay__content z-3 w-50 position-fixed top-50 start-50 translate-middle visually-hidden"
    >
      <button class="btn text-dark z-3 close position-absolute top-25 end-0">
        <img src="assets/imgs/close.svg" alt="close button" />
      </button>
      <div class="splide progress flex-column bg-white">
        <div class="splide__arrows splide__arrows--ltr">
          <button
            class="splide__arrow splide__arrow--prev arr__prev"
            type="button"
            aria-label="Previous slide"
            aria-controls="splide01-track"
          >
            <img src="{{ asset('assets/imgs/arrleft.svg') }}" alt="button previous" />
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
                    <img src="assets/imgs/wpf_birthday.svg" alt="birthday icon" />
                    <span>Birthday</span>
                  </div>
                  <div
                    class="col-3 events d-flex flex-column align-items-center bg-gray"
                  >
                    <img src="assets/imgs/wpf_wedding-cake.svg" alt="birthday icon" />
                    <span> weddings </span>
                  </div>
                  <div
                    class="col-3 events d-flex flex-column align-items-center bg-gray"
                  >
                    <img src="assets/imgs/cil_child.svg" alt="birthday icon" />
                    <span>New born</span>
                  </div>
                </div>
                <div class="row justify-content-between">
                  <div
                    class="col-3 events d-flex flex-column align-items-center bg-gray"
                  >
                    <img
                      src="assets/imgs/game-icons_engagement-ring.svg"
                      alt="birthday icon"
                    />
                    <span>Engagement</span>
                  </div>
                  <div
                    class="col-3 events d-flex flex-column align-items-center bg-gray"
                  >
                    <img
                      src="{{ asset('assets/imgs/mdi_graduation-cap.svg') }}"
                      alt="birthday icon"
                    />
                    <span>Graduation</span>
                  </div>
                  <div
                    class="col-3 events d-flex flex-column align-items-center bg-gray"
                  >
                    <img
                      src="assets/imgs/hugeicons_corporate.svg"
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
                <div class="d-flex gap-2">
                  <button class="form-control">yes</button>
                  <button class="form-control">no</button>
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
                    href="{{ route('register') }}"
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
                      ><img src="assets/imgs/xico.svg" alt="facebook"
                    /></a>
                    <a href="#" class="p-2 bg-gray"
                      ><img src="assets/imgs/appleico.svg" alt="google"
                    /></a>
                    <a href="#" class="p-2 bg-gray"
                      ><img src="assets/imgs/Google.svg" alt="facebook"
                    /></a>
                    <a href="#" class="p-2 bg-gray"
                      ><img src="assets/imgs/teamsico.svg" alt="google"
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

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
  </body>
</html>