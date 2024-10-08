@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('') }}css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/Aboutproviders.css" />
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
        <a class="nav-link m-2" href="./index.html">Full Page</a>
        <a class="nav-link m-2" href="#">Reviews</a>
        <a class="nav-link m-2" href="#">Services</a>
        <a class="nav-link m-2" href="#">Location</a>
        <a class="nav-link m-2 active" href="#">About</a>
        <a class="nav-link m-2" href="#">Packages</a>
      </div>
    </nav>

    <!-- pacckage section -->
    <div class="row col-12 Pacckages">
      About Provider
      <img class="Pacckagesicons" src="./imgs/Group 1000004403.png" alt="" />
      <img class="PacckagesQR" src="./imgs/Frame 1321315269.png" alt="" />
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
    <!-- about -->

    <!-- paragraph -->
    <div class="row paragraph">
      <div class="description">
        <p>
          Our store organizes all types of parties with creative touches that
          give your event a unique flair. Enjoy parties tailored to your
          preferences and budget, with our meticulous attention to detail.
        </p>
      </div>
    </div>
    <!-- paragraph -->

    <!-- info -->

    <div class="container containerInfo">
      <section class="customer-details-container">
        <div class="customer-details-content">
          <div class="customer-details-grid">
            <div class="customer-details-column customer-details-column-left">
              <h2 class="customer-details-title">Customer details</h2>
              <div class="customer-details-labels">
                <label class="customer-details-label">Email</label>
                <label class="customer-details-label">Phone number</label>
                <label class="customer-details-label">Website</label>
                <label class="customer-details-label">License Number</label>
                <label class="customer-details-label">Expiry Date</label>
                <label class="customer-details-label">Permissions</label>
                <label class="customer-details-label">Other</label>
                <label class="customer-details-label">Country</label>
                <label class="customer-details-label">City</label>
                <label class="customer-details-label">Address</label>
                <label class="customer-details-label">Province</label>
                <label class="customer-details-label">Zip</label>
              </div>
            </div>
            <div class="customer-details-column customer-details-column-right">
              <div class="customer-details-values">
                <p class="customer-details-value">kareemabdok4@gmail.com</p>
                <p class="customer-details-value">+9719444444444</p>
                <p class="customer-details-value">www.ana.com</p>
                <p class="customer-details-value">034556</p>
                <p class="customer-details-value">20/15/2024</p>
                <p class="customer-details-value">34555</p>
                <p class="customer-details-value">34555</p>
                <p class="customer-details-value">UAE</p>
                <p class="customer-details-value">dubai</p>
                <p class="customer-details-value">UAE.dif</p>
                <p class="customer-details-value">dubai</p>
                <p class="customer-details-value">3594</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- info -->

    <div class="container containerMission">
      <div class="mission">
        <h2>Mission , Vision & Values</h2>
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
                width: 75.23px;
                height: 0px;
                left: 130px;
                top: 10px;
                position: absolute;
                transform: rotate(180deg);
                transform-origin: 0 0;
                border: 3px #931158 solid;
              "
            ></div>
          </div>
        </div>
        <div>
          <h5 for="">Mission</h5>
          <p>
            Our store organizes all types of parties with creative touches that
            give your event a unique flair
          </p>
          <h5 for="">Vision</h5>
          <p>
            Our store organizes all types of parties with creative touches that
            give your event a unique flair
          </p>
          <h5 for="">Value</h5>
          <p>
            Our store organizes all types of parties with creative touches that
            give your event a unique flair
          </p>
        </div>
      </div>
    </div>
    <div class="container containerMission">
      <div class="mission">
        <h2>Reviews</h2>
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
                width: 75.23px;
                height: 0px;
                left: 130px;
                top: 10px;
                position: absolute;
                transform: rotate(180deg);
                transform-origin: 0 0;
                border: 3px #931158 solid;
              "
            ></div>
          </div>
        </div>
        <div class="reviewphoto">

        </div>
        <div class="reviewtext">
          <span> <img src="./imgs/Mask group.svg" alt=""></span><span style="font-family: Cairo;
          font-size: 16px;
          font-weight: 600;
          line-height: 16px;
          letter-spacing: -0.02em;
          text-align: center;
          "> Mohammed Al Rajhi 
            <span> <img style="width: 86px; height: 18px;" src="./imgs/review.png" alt=""></span>
            <p>dubai</p>
          </span>
          <span class="reviewparagraph">The drinks are a masterpiece. The hotel is more than wonderful. Sweet, <br>
             beautiful, delicious. All the services are delicious.</span>
          <span class="arrowformore">
             <a  href="">More </a></span>
        </div>
      </div>
    </div>
    </div>
@endsection

<div class="pallon1">
    <img src="{{ asset('') }}imgs/Ellipse 364.png" alt="">
  </div>
  <div class="pallon2">
    <img src="{{ asset('') }}imgs/Ellipse 365.png" alt="">
</div>

@push('js')
    <script src="{{ asset('') }}js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('') }}js/service.js"></script>
@endpush