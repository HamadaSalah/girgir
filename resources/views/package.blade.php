
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BookShop</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/royalwedding.css')}}" />
    <!-- fontAwesome  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
  </head>
  <body class="bookShop-container">
    <!-- navbar -->

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
            <a href="{{ route('users.login') }}" class="fm-cairo btn btn-primary py-1 px-3 mx-3"
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
            {{-- <button class="btn btn-outline-primary border-0 py-1 px-2">
              <img src="{{ asset('imgs') }}/Bell_pin_light.svg" alt="bell pin light">
            </button> --}}
            {{-- <button class="btn btn-outline-primary border-0 py-1 px-2">
              <img src="{{ asset('imgs') }}/fav_icon.svg" alt="add to icon">
            </button>
            <button class="btn btn-outline-primary border-0 py-1 px-2"> --}}
              <img src="{{ asset('imgs') }}/messagesnavico.svg" alt="messages icon">
            </button>
            <button class="btn btn-outline-primary border-0 py-1 px-2 mb-1">
              <a href="{{Route('myCart')}}"><img src="{{ asset('imgs') }}/cartnavico.svg" alt="cart icon"></a>
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

    <div class="backgroundService">
      <img
        class="backgroundImg col-sm-6 col-md-6"
        src="{{asset('imgs/Ellipse 398.png')}}"
        alt=""
      />
      <div class="hypernav">
        <a href="">home</a>
        <a href="">Individual providers</a>
        <a href="">Providers : sick rose compay</a>
      </div>
      <div class="companyname">
        <h1>Sick Rose</h1>
        <span>
          <img src="{{asset('imgs/Star 9.png')}}" alt="" />
          <img src="{{asset('imgs/star 9.png')}}" alt="" />
          <img src="{{asset('imgs/star 9.png')}}" alt="" />
          <img src="{{asset('imgs/star 9.png')}}" alt="" />
          <img src="{{asset('imgs/star 9.png')}}" alt="" />
        </span>
        <span
          style="
            font-family: Chau Philomene One;
            font-size: 25px;
            font-weight: 400;
            line-height: 20px;
            letter-spacing: -0.5px;
            text-align: center;
            color: white;
            margin-top: 5px;
          "
          >5.0</span
        >
      </div>
    </div>

    <!-- nav service -->
    <nav class="navitems">
      <div class="navservice">
        <a class="nav-link m-2" href="#">
          <img
            class="vector-item"
            src="{{asset('imgs/material-symbols_home.png')}}"
            alt=""
          />Full Page</a
        >
        <a class="nav-link m-2" href="#">Reviews</a>
        <a class="nav-link m-2 active" href="#">Services</a>
        <a class="nav-link m-2" href="#">Location</a>
        <a class="nav-link m-2" href="./aboutProviders.html">About</a>
        <a class="nav-link m-2" href="#">Pacckages</a>
      </div>
    </nav>

    <!-- ballons image -->

    <div class="ballons">
      <h1>
        Hanging 100 balloons ready
        <span><i class="fa-solid fa-star"></i>4.8</span>
      </h1>
      <div class="">
        @foreach ($package->files as $img)
        <img src="{{asset($img->path)}}" />
            
        @endforeach
      </div>
    </div>
    <!-- service section -->
<form action="{{ Route('addToCard') }}" method="POST">
  @csrf
  <input type="hidden" name="package" value="{{$package->id}}">
    <div class="service">
      <div>
        <h4>
          {{-- <i class="fa-regular fa-clock"></i> --}}
           Description:
          <span>{{$package->description}}</span>
        </h4>
      </div>
      @foreach ($package->services as $service)
      <div class="description">
        <img src="{{asset('imgs/Group 40632.png')}}" alt="">
        <span>{{$service->name}}</span>
        <p style="padding-left: 25px">{{$service->description}}</p>
      </div>
      @endforeach
      {{-- <div class="btnmore">
        <div class="btn1">
            <a href=""><img src="{{asset('imgs/ic_round-plus.png')}}" alt=""> Choose more packages from other providers</a>

        </div>
        <div class="btn2">
            <a href=""><img src="{{asset('imgs/ic_round-plus.png')}}" alt=""> Choose more packages from here</a>
        </div>
      </div> --}}
    </div>

    <!-- delivery section -->

    <div class="delivery">
      <h1><i class="fa-regular fa-clock"></i> Delivery and ordering time</h1>
      <div class="booking">

        {{-- <button>Book Now</button> --}}
        <label for="" style="line-height: 50px">From</label><input type="datetime-local" id="birthdaytime" name="time_from" style="border: 1px solid #CCC;
    padding: 10px 20px;
    border-radius: 25px;">
        <label for=""  style="line-height: 50px">To</label><input type="datetime-local" id="birthdaytime" name="time_to" style="border: 1px solid #CCC;
    padding: 10px 20px;
    border-radius: 25px;">

      </div>
    </div>

    <!-- gender section -->

    <div class="gender">
      <div>
        <i class="fa-solid fa-mars-and-venus"></i>
        <h1>Representative's gender</h1>
      </div>
      <div class="kind">
        <div>
          <input type="radio" name="gender" value="male"><i class="fa-solid fa-person"></i>
          <h4>Male</h4>
        </div>
        <i class="fa-regular fa-circle-check"></i>
      </div>
      <div class="kind">
        <div>
          <input type="radio" name="gender" value="male"><i class="fa-solid fa-person-dress"></i>
          <h4>Female</h4>
        </div>
        <i class="fa-regular fa-circle-check check"></i>
      </div>
    </div>

    <!-- order -->

    <div class="order-summary">
      <div class="order-details">
        <div class="input">
          <h4>Order Location</h4>
          <input
            class="info"
            type="text" name="location"
            placeholder="Kareem Mohsen, Order location Order location"
          />
        </div>

        <div class="input">
          <h4>Note For Provider</h4>
          <input
            class="info"
            type="text" name="notes"
            placeholder="worker: >>>>>>>>>>>>>>>>>>>>>>>>"
          />
        </div>

        <div class="input">
          <h4>Phone Number</h4>
          <input
            class="info"
            type="text" name="phone_numbers"
            placeholder="32456767877, 32456767877"
          />
        </div>

        <div class="code">
          <div class="input">
            <h4>Promo Code</h4>
            <input class="info" type="text" placeholder="32W4E76R877" />
          </div>

          <h4>OR</h4>

          <div class="input">
            <h4>Use Coin</h4>
            <input class="info" type="text" placeholder="1000" />
          </div>
        </div>

        <div class="summary-details">
          {{-- <div class="box">
            <div>DJ shop</div>
            <div>Invoice for balloons</div>
            <div>Data:<span>30/7/2027</span></div>
            <div>Invoice number:<span>123456</span></div>
            <div>status:<span>paid</span></div>
            <!-- <div> -->
            <!-- Data:<span>30/7/2027</span> -->
            <!-- </div> -->
          </div> --}}
          @guest
          <a href="{{ route('users.login') }}" class="fm-cairo btn btn-primary py-1 px-3 mx-3"
          ><span><img src="{{ asset('imgs') }}/loginico.svg" alt="login icon" /></span>
          Login</a
          >
          <a
          href="{{ Route('register') }}"
          class="fm-cairo btn text-bg-light py-1 px-3"
          >
          <span><img src="{{ asset('imgs') }}/signupico.svg" alt="sign up icon" /></span>
          Sign Up</a
          >
          @else
          <div class="btns" style="width: 100%">
            <input class="btn btn-primary" style="display: inline-block;
    width: 40%;float: left;" name="add_to_card" type="submit" value="Add to cart">
            <input class="btn btn-primary" style="display: inline-block;
    width: 40%;float: right;"   name="pay_now" type="submit" value="pay now">
          </div>
          @endguest

        </div>
      </div>
    </div>

    <!-- footer -->
    <footer>
      <div class="footer-container">
        <div class="footer-logo">
          <h2>
            Gir <img style="width: 30%" src="././imgs/Vectorgir.png" alt="" />
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
            ><img src="./imgs/Group 1000004623.png" alt="Facebook"
          /></a>
        </div>
        <div class="footer-apps">
          <h4>Get the app</h4>
          <a href="#"
            ><img
              src="./imgs/app-store.24ce31e7a13056d542d1.png"
              alt="App Store"
          /></a>
          <a href="#"
            ><img
              src="./imgs/googleApp.8f241223f55c067c2fb6.png"
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
    <script src="{{asset('js/BookShop.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>
