@extends('layouts.app')
@section('title' , 'Services')

@push('css')
    <link rel="stylesheet" href="{{ asset('') }}css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/service.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />
@endpush

@section('content')

<div class="backgroundService">
    <img
      class="backgroundImg col-sm-6 col-md-6"
      src="./imgs/Ellipse 398.png"
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
<img src="./imgs/Star 9.png" alt="">
<img src="./imgs/star 9.png" alt="">
<img src="./imgs/star 9.png" alt="">
<img src="./imgs/star 9.png" alt="">
<img src="./imgs/star 9.png" alt="">
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
      <a class="nav-link  m-2" href="#">
        <img class="vector-item" src="./imgs/material-symbols_home.png" alt="" />Full Page</a
      >
      <a class="nav-link m-2" href="#">Reviews</a>
      <a class="nav-link m-2 active" href="#">Services</a>
      <a class="nav-link m-2" href="#">Location</a>
      <a class="nav-link m-2" href="./aboutProviders.html">About</a>
      <a class="nav-link m-2" href="#">Pacckages</a>
    </div>
  </nav>

  <!-- pacckage section -->
  <div class="row col-12 Pacckages">
    Services
    <img class="Pacckagesicons" src="./imgs/Group 1000004403.png" alt="" />
    <img class="PacckagesQR" src="./imgs/Frame 1321315269.png" alt="" />
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
          left: -350px;
          top: 20px;
          position: absolute;
          transform: rotate(180deg);
          transform-origin: 0 0;
          border: 3px #931158 solid;
        "
      ></div>
    </div>
  </div>



  <!-- slider -->
  <main class="main__content sliders ">
    <section class="most_requested mb-5 position-relative">
      <section
        class="splide trinds__slider--one container"
        aria-label="Splide Basic HTML Example"
      >
        <div class="splide__track">
          <ul class="splide__list gap-2">
            {{-- (LOOPING) Start Services--}}
            <li class="splide__slide">
              <div
                class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5"
              >
                <img
                  src="imgs/mdi_heart-outline.svg"
                  alt="add to fav"
                  class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute end-0 me-3 mt-3"
                />

                <img
                  src="imgs/Rectangle 3463357.png"
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
                      ><img src="imgs/rating.svg" alt="rating"
                    /></span>
                  </div>
                  <p class="card-text text-black-50 fs-12">
                    <span class="text-black text-opacity-25 fs-14">
                      <img style="margin-bottom: 5px;" src="imgs/houseico.svg" alt="icon" />
                    <strong>Shop:</strong>  kareem evee <br>
                    <strong> Provider Type :</strong>   Company <br>
                    You Get <img style="width: 16px;height: 16px; margin-bottom: 5px;" src="./imgs/openmoji_coin.png" alt=""><span style="color: #931158;"> 120 Coin </span>
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
            {{-- End Services --}}
          </ul>
        </div>
      </section>
    </section>
  </main>
  <!-- slider -->

  <!-- slider -->
  <main class="main__content sliders ">
      <div class="row Pacckages">
          Best Choice
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
            {{-- (LOOPING) Start Best Choice--}}
            <li class="splide__slide">
              <div class="card mb-5 text-start shadow-sm position-relative border-0 p-0 rounded-5 cardslider2">
                <div class="cardslider2-info">
                <h6>British Flag Theme Party</h6>
                <span><img style="margin-bottom: 5px;" src="./imgs/calendar-check.png" alt="">   <srong>providers :</srong> sick rose</span>
                <span><img style="margin-bottom: 5px;" src="./imgs/dolar.png" alt="">  <strong>Cost :</strong>  1000$</span>
                <span><img style="margin-bottom: 5px; width: 15px;height: 15px;" src="./imgs/star.png" alt="">  <strong>Rating :</strong>  4.9</span>
                </div>
              </div>
            </li>
            {{-- End Best Choice --}}
          </ul>
        </div>
      </section>
    </section>
  </main>
  <!-- slider -->


@endsection

@push('js')
    <script src="{{asset('')}}js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{asset('')}}js/services.js"></script>
@endpush
