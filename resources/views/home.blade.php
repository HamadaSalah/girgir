@extends('layouts.app')
@section('title' , 'Home')

@section('content')

<main class="bg-main main__content">
    <section class="hero position-relative mb-9">
      <section
        class="splide hero__splide"
        aria-label="Splide Basic HTML Example"
      >
        <div class="splide__track">
          <ul class="splide__list gap-2">
            <li class="splide__slide">
              <div>
                <img
                  src="{{ asset('assets') }}/imgs/hero.webp"
                  alt="hero image"
                  class="img-fluid w-100 hero__img"
                />
              </div>
            </li>
            <li class="splide__slide">
              <div>
                <img
                  src="{{ asset('assets') }}/imgs/hero.webp"
                  alt="hero image"
                  class="img-fluid w-100 hero__img"
                />
              </div>
            </li>
            <li class="splide__slide">
              <div>
                <img
                  src="{{ asset('assets') }}/imgs/hero.webp"
                  alt="hero image"
                  class="img-fluid w-100 hero__img"
                />
              </div>
            </li>
          </ul>
        </div>
      </section>

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
        src="{{ asset('assets') }}/imgs/blue-balloon-png-image-2400.png"
        alt="balloon image"
        class="position-absolute translate-middle-y d-none d-lg-block"
      />
      <div
        class="position-absolute end-0 translate-middle-y d-none d-lg-block"
      >
        <img
          src="{{ asset('assets') }}/imgs/istockphoto-1421941487-612x612-removebg-preview 1.png"
          alt="prize image"
        />
        <img
          src="{{ asset('assets') }}/imgs/istockphoto-1421941487-612x612-removebg-preview 5.png"
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
                @foreach ($most_requested_packages as $package)
                <li class="splide__slide">
                    <div
                      class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                    >
                      <img
                        src="{{ asset('assets') }}/imgs/mdi_heart-outline.svg"
                        alt="add to fav"
                        class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                      />

                       <img
                        src="{{ asset($package->files()->first()->path) }}"
                        alt="wedding"
                        class="card-img-top"
                      />

                      <div class="card-body px-2 py-4">
                        <div
                          class="d-flex align-items-center justify-content-between mb-2"
                        >
                          <h3 class="card-title h6 fw-bold mb-0">
                            {{ strlen($package->title) > 20 ? substr($package->title, 0, 20) . '...' : $package->title }}
                          </h3>
                          <span
                            class="d-flex align-items-center bg_rating p-1 rounded-5"
                            ><img
                              src="{{ asset('assets') }}/imgs/Star_1.svg"
                              alt="rating"
                              class="me-1"
                            />
                            <span class="rating__number text-white fs-12 fw-light"
                              >5
                              {{-- {{ number_format($package->averageRating(), 1) }} --}}
                              </span
                            >
                          </span>
                        </div>
                        <p class="card-text text-black-50 fs-12">
                          <span class="text-black text-opacity-25 fs-14"
                            ><img src="{{ asset('assets') }}/imgs/houseico.svg" alt="icon" /> Shop :
                            {{ $package->provider->name }}</span
                          >
                          <br /><br />{{ $package->description }}
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
                            from/<span class="text-primary fw-medium">{{ number_format($package->cost,1) }}</span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
            </ul>
          </div>
        </section>
        <button class="btn btn-primary fw-light py-1 px-3">
          Find out more &rarr;
        </button>
      </div>
    </section>

    <section
      class="splide wedding__splide"
      aria-label="Splide Basic HTML Example"
    >
      <div class="splide__track">
        <ul class="splide__list gap-2">
        @foreach($most_requested_packages as $package)
          <li class="splide__slide">
            <section class="wedding w-100 p-2 mt-5 mb-6 position-relative">
              <div
                class="position-absolute mb-4 d-flex gap-2 bottom-0 start-50 translate-middle-y"
              >
                <span class="line bg-primary"></span>
                <span class="line bg-white"></span
                ><span class="line bg-white"></span>
              </div>
              <div class="container mt-6">
                <div class="d-flex justify-content-between flex-wrap">
                  <div class="d-flex flex-column">
                    <h2 class="text-white display-6 fw-medium">
                      {{  $package->title }}
                    </h2>
                    <ul
                      class="d-flex flex-column gap-2 text-white list-unstyled fm-cairo fs-14"
                    >
                    {{ $package->description }}
                    <p class="text-white fm-cairo fw-medium">
                      providers: {{ $package->provider->name }} <br />
                      sartes from: {{ number_format($package->cost,1) }} $
                    </p>

                    <button
                      class="align-self-center mb-4 btn btn-primary rounded-5 fm-cairo py-2 px-5"
                    >
                      order now
                    </button>
                  </div>
                  <div>
                    <img
                      src="{{ asset('assets') }}/imgs/party.webp"
                      alt="party"
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
            </section>
          </li>
        @endforeach
        </ul>
      </div>
    </section>

    <section class="best_shop mb-6 position-relative">
      <!-- <img
      src="{{ asset('assets') }}/imgs/arr-left.svg"
      alt="arrow left"
      class="position-absolute arr-left"
    />
    <img
      src="{{ asset('assets') }}/imgs/arr-right.svg"
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
                @foreach ($best_shops as $shop)
                <li class="splide__slide">
                    <div
                      class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                    >
                      <img
                        src="{{ asset('assets') }}/imgs/straightromhear.png"
                        alt="add to fav"
                        class="border border-4 border-white rounded-5 position-absolute top-54 start-50 translate-middle"
                      />

                      <img
                        src="{{ asset($package->files()->first()->path) }}"
                        alt="wedding"
                        class="card-img-top"
                      />

                      <div class="card-body d-flex flex-column px-2 py-2">
                        <div
                          class="d-flex align-items-center justify-content-between mb-2"
                        >
                          <h3 class="card-title h6 fw-bold mb-0 mt-4">
                            {{ strlen($shop->business_name) > 15 ? substr($shop->business_name, 0, 15) . '...' : $shop->business_name }}
                          </h3>
                          <span
                            class="d-flex align-items-center bg_rating p-1 rounded-5"
                            ><img
                              src="{{ asset('assets') }}/imgs/Star_1.svg"
                              alt="rating"
                              class="me-1"
                            />
                            <span class="rating__number text-white fs-12 fw-light"
                              >
                              5
                              {{-- {{ number_format($shop->averageRating(),1) }} --}}
                              </span
                            >
                          </span>
                        </div>
                        <p class="card-text text-black-50 fs-12">
                          <span class="text-black fs-6"
                            ><img src="{{ asset('assets') }}/imgs/houseico.svg" alt="icon" /> Shop :
                            {{ $shop->name }}</span
                          >
                        </p>
                        <div class="d-flex justify-content-between">
                          <p class="fs-10">
                            <span
                              ><img src="{{ asset('assets') }}/imgs/clockico.svg" alt="clock icon"
                            /></span>
                            <span class="text-primary fm-cairo">Closed now</span>
                          </p>
                          <p class="fs-10">
                            <span
                              ><img src="{{ asset('assets') }}/imgs/mapico.svg" alt="map icon"
                            /></span>
                            <span class="text-black fm-cairo"
                              >{{ $shop->address ?? "Address not available" }}</span
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
                @endforeach
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
                @foreach ($trendy_packages as $package)
                <li class="splide__slide">
                    <div class="mb-3 position-relative">
                      <img
                        src="{{ asset($package->files()->first()->path) }}"
                        alt="birthday party"
                        class="img-fluid"
                      />
                      <div
                        class="bg-white mb-3 rounded-2 p-2 position-absolute start-50 bottom-0 translate-middle-x w-90"
                      >
                        <h5 class="text-black fw-medium fm-cairo ls-5 text-start">
                            {{ strlen($package->title) > 20 ? substr($package->title, 0, 20) . '...' : $package->title }}
                        </h5>
                        <div class="d-flex justify-content-between">
                          <div class="d-flex align-items-center">
                            <span class="fm-cairo fs-10"
                              ><img
                                src="{{ asset('assets') }}/imgs/union-1.svg"
                                alt="union icon"
                                class="me-1"
                              />providers:</span
                            >
                            <a
                              href="#"
                              class="btn text-black p-1 text-decoration-underline fs-14 fw-medium fm-cairo"
                              >{{ strlen($package->provider->name) > 15 ? substr($package->provider->name, 0, 15) . '...' : $package->provider->name }}</a
                            >
                          </div>
                          <div class="d-flex align-items-center">
                            <span class="fm-cairo fs-10"
                              ><img
                                src="{{ asset('assets') }}/imgs/solar_dollar-bold.svg"
                                alt="union icon"
                                class="me-1"
                            /></span>
                            <p class="cost fm-cairo fs-12 fw-light mb-0">
                              Cost {{number_format($package->cost,1) }}
                            </p>
                          </div>
                          <div class="d-flex align-items-center">
                            <span class="fm-cairo fs-10"
                              ><img
                                src="{{ asset('assets') }}/imgs/star.svg"
                                alt="union icon"
                                class="me-1 rounded-5 bg-black p-1"
                            /></span>
                            <p class="cost fm-cairo fs-12 fw-light mb-0">
                              rating 5
                              {{-- {{ number_format($package->averageRating(),1) }} --}}
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
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
            src="{{ asset('assets') }}/imgs/robot.png"
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
@endsection
