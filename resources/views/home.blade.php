@extends('layouts.app')
@section('title' , 'Home Page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endpush

@section('content')


<main class="bg-main main__content">
    <section class="hero position-relative mb-9">
        <section class="splide hero__splide" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list gap-2">
                    <li class="splide__slide">
                        <div>
                            <img src="{{ asset('imgs') }}/hero.webp" alt="hero image"
                                class="img-fluid w-100 hero__img" />
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div>
                            <img src="{{ asset('imgs') }}/hero.webp" alt="hero image"
                                class="img-fluid w-100 hero__img" />
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div>
                            <img src="{{ asset('imgs') }}/hero.webp" alt="hero image"
                                class="img-fluid w-100 hero__img" />
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <div
            class="w-50 position-absolute py-1 px-2 py-lg-4 px-lg-6 text-center bottom-0 start-50 bg-white hero__content rounded-3 align-self-center shadow-lg">
            <h1 class="hero__title text-primary">Plan your dream event</h1>
            <p class="hero__text text-center">
                Weddings, galas, birthdays, and beyond Gir Gir events connects you
                with exclusive venues, vendors, and inspiration you won't find
                anywhere else.
            </p>
            <button class="btn btn-primary fw-light text-uppercase fs-6 py-1 px-3 start__planning">
                start planning &rarr;
            </button>
        </div>
    </section>

    <section class="most_requested mb-5 position-relative">
        <img src="{{ asset('imgs') }}/blue-balloon-png-image-2400.png" alt="balloon image"
            class="position-absolute translate-middle-y d-none d-lg-block" />
        <div class="position-absolute end-0 translate-middle-y d-none d-lg-block">
            <img src="{{ asset('imgs') }}/istockphoto-1421941487-612x612-removebg-preview 1.png"
                alt="prize image" />
            <img src="{{ asset('imgs') }}/istockphoto-1421941487-612x612-removebg-preview 5.png"
                alt="prize image" />
        </div>

        <div class="container text-center">
            <h2 class="heading position-relative">Most requested</h2>
            <p class="text-black-50">Here are the most searched packages ever</p>

            <section class="splide trinds__slider--two container" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list gap-2">
                        {{-- (LOOPING) Most requested packages --}}

                      @foreach ($most_requested_packages as $package)
                      <li class="splide__slide">
                        <div
                          class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                        >
                          <img
                            src="{{ asset('') }}/imgs/mdi_heart-outline.svg"
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
                                  src="{{ asset('') }}/imgs/Star_1.svg"
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
                            <div>
                              <img src="{{ asset('') }}/imgs/houseico.svg" alt="icon" class="myiconn" />
                              <span class="text-black text-opacity-25 fs-14"
                                > Shop :
                                {{ $package->provider->name }}</span
                              >
                              <br />
                              <p class="card-text text-black-50 fs-12"> {{ $package->description }}</p>
                            </div>
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


                      {{-- end of Most requested packages --}}
                    </ul>
                </div>
            </section>
            <button class="btn btn-primary fw-light py-1 px-3">
                Find out more &rarr;
            </button>
        </div>
    </section>

    <section class="splide wedding__splide" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list gap-2">
                {{-- (LOOPING)  Big banner --}}
                <li class="splide__slide">
                    <section class="wedding w-100 p-2 mt-5 mb-6 position-relative">
                        <div class="position-absolute mb-4 d-flex gap-2 bottom-0 start-50 translate-middle-y">
                            <span class="line bg-primary"></span>
                            <span class="line bg-white"></span><span class="line bg-white"></span>
                        </div>
                        <div class="container mt-6">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex flex-column">
                                    <h2 class="text-white display-6 fw-medium">
                                        Wedding packages
                                    </h2>
                                    <ul class="d-flex flex-column gap-2 text-white list-unstyled fm-cairo fs-14">
                                        <li>
                                            <span class="right position-relative"><img
                                                    src="{{ asset('imgs') }}/rightprimary.svg"
                                                    alt="right check" /></span>
                                            DJ and Music
                                        </li>

                                        <li>
                                            <span class="right position-relative"><img
                                                    src="{{ asset('imgs') }}/rightprimary.svg"
                                                    alt="right check" /></span>
                                            Balloons and Decorations
                                        </li>
                                        <li>
                                            <span class="right position-relative"><img
                                                    src="{{ asset('imgs') }}/rightprimary.svg"
                                                    alt="right check" /></span>
                                            Cake and Sweets
                                        </li>
                                        <li>
                                            <span class="right position-relative"><img
                                                    src="{{ asset('imgs') }}/rightprimary.svg"
                                                    alt="right check" /></span>
                                            Food and Drinks
                                        </li>
                                        <li>
                                            <span class="right position-relative"><img
                                                    src="{{ asset('imgs') }}/rightprimary.svg"
                                                    alt="right check" /></span>
                                            Party Favors
                                        </li>
                                    </ul>
                                    <p class="text-white fm-cairo fw-medium">
                                        providers: sick rose compay <br />
                                        sates from: 100.3 $
                                    </p>

                                    <button class="align-self-center mb-4 btn btn-primary rounded-5 fm-cairo py-2 px-5">
                                        order now
                                    </button>
                                </div>
                                <div>
                                    <img src="{{ asset('imgs') }}/party.webp" alt="party"
                                        class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </section>
                </li>
                {{-- end of Big banner --}}
            </ul>
        </div>
    </section>

    <section class="best_shop mb-6 position-relative">
        <!-- <img
      src="{{ asset('imgs') }}/arr-left.svg"
      alt="arrow left"
      class="position-absolute arr-left"
    />
    <img
      src="{{ asset('imgs') }}/arr-right.svg"
      alt="arrow right"
      class="position-absolute arr-right"
    /> -->

        <div class="container text-center">
            <h2 class="heading position-relative">Best shops</h2>
            <p class="text-black-50">
                Here are the best-selling stores for wedding and birthday packages
            </p>

            <section class="splide trinds__slider--three container" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list gap-2">
                        {{-- (LOOPING) Best shops --}}
                        @foreach ($best_shops as $shop)
                        <li class="splide__slide">
                            <div
                              class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
                            >
                              <img
                                src="{{ asset('') }}/imgs/straightromhear.png"
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
                                      src="{{ asset('') }}/imgs/Star_1.svg"
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
                                    ><img src="{{ asset('') }}/imgs/houseico.svg" alt="icon" class="myiconn" /> Shop :
                                    {{ $shop->name }}</span
                                  >
                                </p>
                                <div class="d-flex justify-content-between">
                                  <p class="fs-10">
                                    <span
                                      ><img src="{{ asset('') }}/imgs/clockico.svg" alt="clock icon"
                                    /></span>
                                    <span class="text-primary fm-cairo">Closed now</span>
                                  </p>
                                  <p class="fs-10">
                                    <span
                                      ><img src="{{ asset('') }}/imgs/mapico.svg" alt="map icon"
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
        
                        {{-- end of Best shops --}}
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
            <section class="splide trinds__slider--one container" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list gap-2">
                        {{-- (LOOPING) Trinds --}}
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
                                        src="{{ asset('') }}/imgs/union-1.svg"
                                        alt="union icon"
                                        class="me-1"
                                      />providers:</span
                                    >
                                    <a
                                      href="#"
                                      class="btn text-black p-1 text-decoration-underline fs-10 fw-medium fm-cairo"
                                      >{{ strlen($package->provider->name) > 15 ? substr($package->provider->name, 0, 15) . '...' : $package->provider->name }}</a
                                    >
                                  </div>
                                  <div class="d-flex align-items-center">
                                    <span class="fm-cairo fs-10"
                                      ><img
                                        src="{{ asset('') }}/imgs/solar_dollar-bold.svg"
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
                                        src="{{ asset('') }}/imgs/star.svg"
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
        
                        {{-- end of Trinds --}}
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
                <img src="{{ asset('imgs') }}/robot.png" alt="ai assistant"
                    class="robot__img position-relative" />
                <div>
                    <h4 class="text-primary">Let me help you.</h4>
                    <p class="text-black-50">
                        What is your event, and how many people will be attending?
                    </p>
                    <input type="text" class="form-control bg-white py-sm-0 px-sm-0 py-lg-4 px-lg-2 bg-opacity-50 w-165"
                        placeholder="I have 20 guests for a birthday party. I want a birthday cake, and I need a clown for the kids." />
                </div>
            </div>
        </div>
    </section>
</main>

<section class="search__results bg-main d-none">
    <div class="container mt-4">
        <div class="routing d-flex align-items-center">
            <a href="#" class="text-black home__main fs-10 me-2 fw-light">Home</a>
            <span class="text-black">-</span>
            <a href="#" class="text-black fs-10 ms-2 fw-light add__package">Search Filter</a>
        </div>
        <h3 class="mt-3 mb-5 me-2 h1">Search results</h3>
        <div class="d-flex justify-content-between border-bottom pb-2 mb-4 search__content position-relative">
            <div class="d-flex align-items-center">
                <label for="#type" class="service__label">Service Provider :</label>
                <select id="type" name="type" id="type" class="form-select border-0 text-black-50 bg-main">
                    <option value="Individual providers">
                        Individual service providers
                    </option>
                    <option value="Company providers" selected>
                        Company service providers
                    </option>
                </select>
            </div>
            <button class="btn filter__btn position-relative">
                <img src="{{ asset('imgs') }}/filterlogo.svg" alt="filter" class="img-fluid" />
                <ul class="p-2 bg-gray position-absolute start-0 rounded-2 filters visually-hidden z-3 list-unstyled">
                    <h5>Provider Type :</h5>
                    <li class="filters_item">
                        <a href="#" class="btn p-1 text-black-50">All providers</a>
                    </li>
                    <li class="filters_item">
                        <a href="#" class="btn p-1 text-black-50">Company providers</a>
                    </li>
                    <li class="filters_item">
                        <a href="#" class="btn p-1 text-black-50">Individual providers</a>
                    </li>
                </ul>
            </button>
        </div>
        <div class="row gap-4 justify-content-center">
            <div
                class="col-lg-5 flex-column flex-lg-row card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5 flex-row">
                <img src="{{ asset('imgs') }}/mdi_heart-outline.svg" alt="add to fav"
                    class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute add__tofav mt-3" />

                <img src="{{ asset('imgs') }}/most1.png" alt="wedding"
                    class="card-img-top img-fluid rounded-3" />

                <div class="card-body rounded-5 px-4 py-2 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="card-title h6 fw-bold mb-0">Pink Theme Wedding</h3>
                        <span class="d-flex align-items-center bg_rating p-1 rounded-5"><img
                                src="{{ asset('imgs') }}/Star_1.svg" alt="rating" class="me-1" />
                            <span class="rating__number text-white fs-12 fw-light">4.9</span>
                        </span>
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
                        <a href="#" class="btn btn-primary fm-cairo py-1 px-5 rounded-2">Edit</a>
                        <a href="#" class="btn btn-primary fm-cairo py-1 px-2 rounded-2">Discover now</a>
                    </div>
                </div>
            </div>
            <div
                class="col-lg-5 flex-column flex-lg-row card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5 flex-row">
                <img src="{{ asset('imgs') }}/mdi_heart-outline.svg" alt="add to fav"
                    class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute add__tofav mt-3" />

                <img src="{{ asset('imgs') }}/most1.png" alt="wedding"
                    class="card-img-top img-fluid rounded-3" />

                <div class="card-body rounded-5 px-4 py-2 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="card-title h6 fw-bold mb-0">Pink Theme Wedding</h3>
                        <span class="d-flex align-items-center bg_rating p-1 rounded-5"><img
                                src="{{ asset('imgs') }}/Star_1.svg" alt="rating" class="me-1" />
                            <span class="rating__number text-white fs-12 fw-light">4.9</span>
                        </span>
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
                        <a href="#" class="btn btn-primary fm-cairo py-1 px-5 rounded-2">Edit</a>
                        <a href="#" class="btn btn-primary fm-cairo py-1 px-2 rounded-2">Discover now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gap-4 justify-content-center">
            <div
                class="col-lg-5 flex-column flex-lg-row card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5 flex-row">
                <img src="{{ asset('imgs') }}/mdi_heart-outline.svg" alt="add to fav"
                    class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute add__tofav mt-3" />

                <img src="{{ asset('imgs') }}/most1.png" alt="wedding"
                    class="card-img-top img-fluid rounded-3" />

                <div class="card-body rounded-5 px-4 py-2 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="card-title h6 fw-bold mb-0">Pink Theme Wedding</h3>
                        <span class="d-flex align-items-center bg_rating p-1 rounded-5"><img
                                src="{{ asset('imgs') }}/Star_1.svg" alt="rating" class="me-1" />
                            <span class="rating__number text-white fs-12 fw-light">4.9</span>
                        </span>
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
                        <a href="#" class="btn btn-primary fm-cairo py-1 px-5 rounded-2">Edit</a>
                        <a href="#" class="btn btn-primary fm-cairo py-1 px-2 rounded-2">Discover now</a>
                    </div>
                </div>
            </div>
            <div
                class="col-lg-5 flex-column flex-lg-row card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5 flex-row">
                <img src="{{ asset('imgs') }}/mdi_heart-outline.svg" alt="add to fav"
                    class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute add__tofav mt-3" />

                <img src="{{ asset('imgs') }}/most1.png" alt="wedding"
                    class="card-img-top img-fluid rounded-3" />

                <div class="card-body rounded-5 px-4 py-2 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="card-title h6 fw-bold mb-0">Pink Theme Wedding</h3>
                        <span class="d-flex align-items-center bg_rating p-1 rounded-5"><img
                                src="{{ asset('imgs') }}/Star_1.svg" alt="rating" class="me-1" />
                            <span class="rating__number text-white fs-12 fw-light">4.9</span>
                        </span>
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
                        <a href="#" class="btn btn-primary fm-cairo py-1 px-5 rounded-2">Edit</a>
                        <a href="#" class="btn btn-primary fm-cairo py-1 px-2 rounded-2">Discover now</a>
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
        <section class="splide services__slider--one container" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list gap-2">
                    <li class="splide__slide">
                        <div class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5">
                            <img src="{{ asset('imgs') }}/mdi_heart-outline.svg" alt="add to fav"
                                class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3" />

                            <img src="{{ asset('imgs') }}/most1.png" alt="wedding"
                                class="card-img-top" />

                            <div class="card-body px-2 py-3">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h3 class="card-title h6 fw-bold mb-0">100 Ballons</h3>
                                    <span class="d-flex align-items-center bg_rating p-1 rounded-5"><img
                                            src="{{ asset('imgs') }}/Star_1.svg" alt="rating"
                                            class="me-1" />
                                        <span class="rating__number text-white fs-12 fw-light">4.9</span>
                                    </span>
                                </div>
                                <p class="card-text text-black-50 fs-12 d-flex align-items-center mb-2">
                                    <span class="text-black text-opacity-25 fs-14 d-flex align-items-center"><img
                                            src="{{ asset('imgs') }}/houseico.svg" alt="icon" class="myiconn" /> Shop
                                        :
                                    </span>
                                    kareem evee
                                </p>
                                <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                                    Provider Type :
                                    <span class="text-secondary text-black-50">
                                        Company
                                    </span>
                                </p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="#" class="btn btn-primary fm-cairo py-1 px-2 rounded-2">+ add your
                                        package</a>
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
        <a href="#" class="text-black fs-10 ms-2 fw-light add__package">Search Filter</a>
        <h3 class="mt-3 mb-5 me-2 h1">Search results</h3>
        <p class="fm-cairo">
            search :
            <span class="search__message text-decoration-underline text-black-50">birthday32</span>
        </p>
        <div class="d-flex flex-column align-items-center">
            <img src="{{ asset('imgs') }}/cart.png" alt="cart image" />
            <p class="mr-neg-3 mt-4">No data</p>
        </div>
    </div>
</section>


@endsection


@push('js')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="js/script.js"></script>
@endpush
