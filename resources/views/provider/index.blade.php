@extends('layouts.app')
@section('title' , 'Provider')
@push('css')
    <link rel="stylesheet" href="{{ asset('') }}css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/service.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />
@endpush

@section('content')

<div class="backgroundService">
    <img
      class="backgroundImg col-sm-6 col-md-6"
      src="{{ asset('imgs') }}/Ellipse 398.png"
      alt=""
    />
    <div class="hypernav">
      <a href="">home</a>
      <a href="">Individual providers</a>
      <a href="">Providers : sick rose compay</a>
    </div>
    <div class="companyname">
<h1>
Sick Rose
</h1>
<span>
<img src="{{ asset('imgs') }}/Star 9.png" alt="">
<img src="{{ asset('imgs') }}/star 9.png" alt="">
<img src="{{ asset('imgs') }}/star 9.png" alt="">
<img src="{{ asset('imgs') }}/star 9.png" alt="">
<img src="{{ asset('imgs') }}/star 9.png" alt="">
</span>
<span style="font-family: Chau Philomene One;
font-size: 25px;
font-weight: 400;
line-height: 20px;
letter-spacing: -0.5px;
text-align: center;
; color: white;
margin-top: 5px; ">5.0</span>
    </div>
  </div>

  <!-- nav service -->
  <nav class="navitems">
    <div class="navservice">
      <a class="nav-link active m-2" href="#">
        <img class="vector-item" src="{{ asset('imgs') }}/material-symbols_home.png" alt="" />Full Page</a
      >
      <a class="nav-link m-2" href="#">Reviews</a>
      <a class="nav-link m-2" href="#">Services</a>
      <a class="nav-link m-2" href="#">Location</a>
      <a class="nav-link m-2" href="./aboutProviders.html">About</a>
      <a class="nav-link m-2" href="#">Packages</a>
    </div>
  </nav>

  <!-- pacckage section -->
  <div class="row Pacckages">
    Packages
    <img class="Pacckagesicons" src="{{ asset('imgs') }}/Group 1000004403.png" alt="" />
    <img class="PacckagesQR" src="{{ asset('imgs') }}/Frame 1321315269.png" alt="" />
  </div>
  <div class="row col-12">
    <div
      class="Group40660"
      style="
        width: 638px;
        height: 0.5px;
        position: relative;
        transform: rotate(180deg);
        transform-origin: 0 0;
      "
    >
      <div
        class="Line441"
        style="
          width: 65.23px;
          height: 0px;
          left: -130px;
          top: 20px;
          position: absolute;
          transform: rotate(180deg);
          transform-origin: 0 0;
          border: 3px #931158 solid;
        "
      ></div>
    </div>
  </div>
  <!-- items -->

  <div class="package-list container p-10">
    <img
      src="{{ asset('imgs') }}/blue-balloon-png-image-2400.png"
      alt=""
      class="bluepallon"
    />
    <img
      src="{{ asset('imgs') }}/purple-balloon-png-image-2416.png"
      alt=""
      class="puprepallon"
    />
    <img
      src="{{ asset('imgs') }}/purple-balloon-png-image-2416.png"
      alt=""
      class="puprepallon2"
    />
    {{-- (LOOPING) Provider's Packages Start--}}
    <div class="package-card">
      <img src="{{ asset('imgs') }}/Rectangle 18903.png" alt="Pink Theme Wedding" />
      <span
        ><img
          class="favouriteicon"
          src="{{ asset('imgs') }}/Vector fav.png"
          alt="Pink Theme Wedding"
      /></span>

      <div class="package-content">
        <h3>Pink Theme Wedding</h3>
        <p><strong>Name Shop:</strong> karreem eve</p>
        <p><strong>Details:</strong> 100 Guests, DJ, Music, Drinks</p>
        <p><strong>Provider Type:</strong> Company</p>
        <p><strong>From:</strong> <span style="color: #931158">100$</span></p>
        <p>
          <strong>You Get:</strong
          ><span style="color: #931158"> 1204 Coin</span>
        </p>
        <div class="package-footer">
          <span class="rating"
            ><img
              style="width: 12.6px; height: 12.57px"
              src="{{ asset('imgs') }}/Star 1.png"
              alt=""
            />
            4.9</span
          >
          <button class="discover-btn">Discover now</button>
        </div>
      </div>
    </div>
    {{-- Provider's Packages End--}}
    <div class=" btnitems col-12">
      <button class="col-2 m-1 ">Find out more <img style="width: 20px;height: 10px;" src="{{ asset('imgs') }}/Arrow 3.png" alt=""></buttton>
    </div>
  </div>




  <!-- slider -->
  <main class="main__content sliders ">
    <div class="row Pacckages">
      Services
      <img class="Pacckagesicons" src="{{ asset('imgs') }}/Group 1000004403.png" alt="" />
      <img class="PacckagesQR" src="{{ asset('imgs') }}/Frame 1321315269.png" alt="" />
    </div>
    <div class="col-12">
      <div
        class="Group40660"
        style="
          width: 638px;
          height: 0.5px;
          position: relative;
          transform: rotate(180deg);
          transform-origin: 0 0;
        "
      >
        <div
          class="Line441"
          style="
            width: 65.23px;
            height: 0px;
            left: -130px;
            top: 20px;
            position: absolute;
            transform: rotate(180deg);
            transform-origin: 0 0;
            border: 3px #931158 solid;
          "
        ></div>
      </div>
    </div>
    <section class="most_requested mb-5 position-relative">
      <section
        class="splide trinds__slider--one container"
        aria-label="Splide Basic HTML Example"
      >
        <div class="splide__track">
          <ul class="splide__list gap-2">
            {{-- (LOOPING) Services Start--}}
            <li class="splide__slide">
              <div
                class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
              >
                <img
                  src="{{ asset('imgs') }}/mdi_heart-outline.svg"
                  alt="add to fav"
                  class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                />

                <img
                  src="{{ asset('imgs') }}/Rectangle 3463357.png"
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
                      ><img src="{{ asset('imgs') }}/rating.svg" alt="rating"
                    /></span>
                  </div>
                  <p class="card-text text-black-50 fs-12">
                    <span class="text-black text-opacity-25 fs-14">
                      <img style="margin-bottom: 5px;" src="{{ asset('imgs') }}/houseico.svg" alt="icon" />
                    <strong>Shop:</strong>  kareem evee <br>
                    <strong> Provider Type :</strong>   Company <br>
                    You Get <img style="width: 16px;height: 16px; margin-bottom: 5px;" src="{{ asset('imgs') }}/openmoji_coin.png" alt=""><span style="color: #931158;"> 1990 Coin </span>
                    </span>

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
                      <span class="text-primary fw-medium " style="font-family: Cairo;font-size: 19px;font-weight: 500;line-height: 20px;letter-spacing: -0.5px;
                      ">100.2$</span>
                    </p>
                  </div>
                </div>
              </div>
            </li>
            {{-- Services End --}}
          </ul>
        </div>
      </section>
    </section>
  </main>
  <!-- slider -->





  
















  <div class="col-12 Dream-Event">
    <div class="container p-4">
      <h2>Make Your Own Package NOW</h2>
      <p>Click on the START PLANNING button below and a window will appear with everything you want to have a very special party.</p>
    </div>
    <div class="container Dream-Eventbox p-2">
      <h3>Plan Your Dream Event        </h3>
      <p>Weddings, galas, birthdays, and beyond Gir Gir events connects you with exclusive venues, vendors, and inspiration you won't find anywhere else.
        Plan Your Dream Event
        </p>
        <button class=" ">Find out more <img style="width: 20px;height: 10px;" src="{{ asset('imgs') }}/Arrow 3.png" alt=""></buttton>


    </div>

  </div> 




  <!-- slider -->
  <main class="main__content sliders ">
    <div class="row Pacckages">
      Best Choice
      <img class="Pacckagesicons" src="{{ asset('imgs') }}/Group 1000004403.png" alt="" />
      <img class="PacckagesQR" src="{{ asset('imgs') }}/Frame 1321315269.png" alt="" />
    </div>
    <div class="col-12">
      <div
        class="Group40660"
        style="
          width: 638px;
          height: 0.5px;
          position: relative;
          transform: rotate(180deg);
          transform-origin: 0 0;
        "
      >
        <div
          class="Line441"
          style="
            width: 65.23px;
            height: 0px;
            left: -130px;
            top: 20px;
            position: absolute;
            transform: rotate(180deg);
            transform-origin: 0 0;
            border: 3px #931158 solid;
          "
        ></div>
      </div>
    </div>
    <section class="most_requested mb-5 position-relative">
      <section
        class="splide trinds__slider--two container"
        aria-label="Splide Basic HTML Example"
      >
        <div class="splide__track">
          <ul class="splide__list gap-2">
            {{-- (LOOPING) Best Choice Start--}}
            <li class="splide__slide">
              <div class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5 cardslider2">
                <div class="cardslider2-info">
                <h6>British Flag Theme Party</h6>
                <span><img style="margin-bottom: 5px;" src="{{ asset('imgs') }}/calendar-check.png" alt="">   <srong>providers :</srong> sick rose</span>
                <span><img style="margin-bottom: 5px;" src="{{ asset('imgs') }}/dolar.png" alt="">  <strong>Cost :</strong>  1000$</span>
                <span><img style="margin-bottom: 5px; width: 15px;height: 15px;" src="{{ asset('imgs') }}/star.png" alt="">  <strong>Rating :</strong>  4.9</span>
                </div>
              </div>
            </li>
            {{--Best Choice End --}}
          </ul>
        </div>
      </section>
    </section>
  </main>
  <!-- slider -->


@endsection


@push('js')
    <script src="{{ asset('') }}js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('') }}js/service.js"></script>
@endpush