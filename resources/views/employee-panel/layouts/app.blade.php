<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Provider Panel | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('provider-panel') }}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('provider-panel') }}/css/service.css" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Cairo', sans-serif !important;
        }
    </style>
  </head>
  <body>
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
            <a href="#" class="navbar-brand ps-5">
              <img src="{{ asset('') }}imgs/logo.svg" alt="brand logo"
            /></a>
            <ul class="navbar-nav align-items-center">
              <li class="nav-item active px-4">
                <a class="nav-link" href="{{ route('employee-panel.home') }}">Home</a>
              </li>
              <li class="nav-item px-4">
                <a class="nav-link" href="{{ route('employee-panel.orders.index') }}">Assigned Orders</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="row align-items-center text-center">
        <div class="col d-flex align-items-center justify-content-start mt-2 mb-2">
            <!-- User Image -->
            <img src="{{ auth()->user()->avatar }}" alt="User Image" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">
            <span>{{ auth()->user()->name }}</span>
            <span class="text-center" style="margin-left: 3px;">({{ auth()->user()->manager_id }})</span>
            <span class="text-center" style="margin-left: 3px;"> - Company: {{ auth()->user()->provider->name }}</span>
            <span class="text-center" style="margin-left: 3px;">({{ auth()->user()->company_id }})</span>
        </div>
        <div class="col text-end">
            <a href="{{ route('employee-panel.logout') }}">Logout</a>
        </div>
    </div>
    </div>

    <!-- Sidebar and Main Content -->
    <div class="container-fluid">
      <div class="row">
        @yield('sidebar')
        @yield('content')
      </div>
    </div>

<!-- footer -->
<footer>
    <div class="footer-container">
      <div class="footer-logo">
        <h2>
          Gir <img style="width: 30%" src="{{ asset('') }}imgs/Vectorgir.png" alt="" />
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
          ><img src="{{ asset('') }}imgs/Group 1000004623.png" alt="Facebook"
        /></a>
      </div>
      <div class="footer-apps">
        <h4>Get the app</h4>
        <a href="{{ $website_info->app_store_link }}"
            target="_blank"
          ><img
            src="{{ asset('') }}imgs/app-store.24ce31e7a13056d542d1.png"
            alt="App Store"
        /></a>
        <a href="{{ $website_info->play_store_link }}"
            target="_blank"
          ><img
            src="{{ asset('') }}imgs/googleApp.8f241223f55c067c2fb6.png"
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

    <script src="{{ asset('provider-panel') }}/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('provider-panel') }}/js/service.js"></script>
  </body>
</html>
