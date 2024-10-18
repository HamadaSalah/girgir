<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newborn</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/NewBorn.css') }}" />
    <!-- fontAwesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body class="newBorn-container">
    <!-- navbar -->
    <div class="container-fluid border-bottom">
        <div class="row align-items-center">
            <nav class="navbar navbar-expand-lg col-md-12 col-lg-6">
                <button class="navbar-toggler border-0 ms-auto" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center text-lg-start" id="navbarNav">
                    <a href="{{ Route('home') }}" class="navbar-brand ps-5">
                        <img src="{{ asset('imgs') }}/logo.svg" alt="brand logo" /></a>
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
                <a href="#contactus" class="text-decoration-none text-black text-opacity-75">
                    <img src="{{ asset('imgs') }}/call-calling.svg" alt="contact us" />
                    <span>Contact Us</span>
                </a>
                @guest
                    <a href="#" class="fm-cairo btn btn-primary py-1 px-3 mx-3"><span><img
                                src="{{ asset('imgs') }}/loginico.svg" alt="login icon" /></span>
                        Login</a>
                    <a href="signupuser.html" class="fm-cairo btn text-bg-light py-1 px-3">
                        <span><img src="{{ asset('imgs') }}/signupico.svg"
                                alt="sign up icon" /></span>
                        Sign Up</a>
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
                       <a href="{{Route('myCart')}}"> <img src="{{ asset('imgs') }}/cartnavico.svg" alt="cart icon"></a>
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
            <span><img src="{{ asset('imgs/openmoji_coin.png') }}" alt="">
                {{ auth()->user()?->coins }} Coin</span>
        </div>
        {{-- End auth user coins --}}
        <div class="col-6 d-none d-lg-block">
            <ul class="list-group d-flex flex-row ms-5">
                {{-- (LOOPING) Start categories --}}
                @foreach(categories() as $category)
                    <li class="list-group-item p-0 border-0">
                        <a href="{{ Route('category', $category->id) }}"
                            class="btn px-2 py-3 text-black-50">{{ $category->name }}</a>
                    </li>
                @endforeach
                {{-- End categories --}}
            </ul>
        </div>
        <div class="col-lg-5 col-sm-12">
            <form class="form form__nav my-3 me-5">
                <div class="input-group border ms-2 rounded rounded-5">
                    <input type="text" class="form-control border-end-0 rounded-start-5 p-2 form__nav--input"
                        placeholder="What is the event?">
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
        <img class="backgroundImg col-sm-6 col-md-6" src="{{ asset('imgs/Ellipse 398.png') }}"
            alt="" />
        {{-- <div class="hypernav">
            <a href="">home</a>
            <a href="">Individual providers</a>
            <a href="">Providers : sick rose compay</a>
        </div> --}}
        <div class="companyname">
            <h1>
                {{ $provider->name }}
            </h1>
            <span>
                <img src="{{ asset('imgs/Star 9.png') }}" alt="">
                <img src="{{ asset('imgs/star 9.png') }}" alt="">
                <img src="{{ asset('imgs/star 9.png') }}" alt="">
                <img src="{{ asset('imgs/star 9.png') }}" alt="">
                <img src="{{ asset('imgs/star 9.png') }}" alt="">
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
                <img class="vector-item" src="{{ asset('imgs/material-symbols_home.png') }}"
                    alt="" />Full Page</a>
            <a class="nav-link m-2" href="#">Reviews</a>
            <a class="nav-link m-2" href="#">Services</a>
            <a class="nav-link m-2" href="#">Location</a>
            <a class="nav-link m-2" href="./aboutProviders.html">About</a>
            <a class="nav-link m-2" href="#">Pacckages</a>
        </div>
    </nav>
    <div class="clearfix" style="display: block;height:100px"></div>
    <!-- body -->

    <div class="divide">

        <!-- DashBoard -->

        <aside>
            <ul>
                <li>birthday <i class="fa-solid fa-crown"></i></li>
                <li>new born <i class="fa-solid fa-face-smile"></i></li>
                <li>baby gender <i class="fa-solid fa-mars-and-venus"></i></li>
                <li>wedding <img style="width: 25px;height: 25px;" src="./imgs/wpf_wedding-cake.png" alt=""></li>
                <li>more <i class="fa-solid fa-arrow-down"></i></li>
            </ul>
        </aside>

        <div>

            @foreach ($categories as $category)
            <!-- New born  section-->
            <div class="newBorn">
                <h1>{{ $category->name}}</h1>
                <div class="myCards">
                    @foreach ($category->packages as $package)
                        
                    @endforeach
                    <div class="myCard">
                        <div class="image">
                            <img src="{{ $package->files[0]->path }}" />

                        </div>
                        <div class="info">
                            <div class="header">
                                <h1>{{ $package->name }}</h1>
                                <span><i class="fa-solid fa-star"></i>4.8</span>
                            </div>
                            <p>details</p>
                            <span>{{ $package->description }}</span>
                            <span> from / {{ $package->cost }}$</span>
                            <button>Discover now</button>
                        </div>
                    </div>

                </div>

            </div>

                
            @endforeach
            <!-- baby gender  section-->


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
                <a href="#"><img src="././imgs/Group 1000004623.png" alt="Facebook" /></a>
            </div>
            <div class="footer-apps">
                <h4>Get the app</h4>
                <a href="#"><img src="././imgs/app-store.24ce31e7a13056d542d1.png" alt="App Store" /></a>
                <a href="#"><img src="././imgs/googleApp.8f241223f55c067c2fb6.png" alt="Google Play" /></a>
            </div>
        </div>
        <div class="col-12">
            <div class="footer-bottom">
                <p>Company, 2024.</p>
            </div>
        </div>
    </footer>
</body>

</html>
