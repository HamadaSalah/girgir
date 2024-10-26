@extends('layouts.app')
@section('title' , 'Home Page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endpush

@section('content')
 
<body>
 
    <!-- writes your Order Details here -->
    <section class="k-order-details bg-main">
      <div class="container">
        <!-- Breadcrumb -->
 
        <div class="row mt-5">
          <!-- Main Content (Orders and Invoices + Track Order) -->
          <div class="col-12 col-lg-8 orders-invoices">
            <!-- Section for Steps -->
            <div class="col-12 steps-section mb-5">
              <div class="steps">
                <div class="step">
                  <div class="icon">
                    <img src="/imgs/k-true.svg" alt="true" loading="lazy" />
                  </div>
                  <span>Request a service</span>
                </div>
                <div class="step">
                  <div class="icon">
                    <img src="/imgs/k-true.svg" alt="true" loading="lazy" />
                  </div>
                  <span>Confirm order</span>
                </div>
                <div class="step">
                  <div class="icon">
                    <img src="/imgs/k-true.svg" alt="true" loading="lazy" />
                  </div>
                  <span>Service agreed</span>
                </div>
                <div class="step">
                  <div class="icon">
                    <img src="/imgs/k-true.svg" alt="true" loading="lazy" />
                  </div>
                  <span>OrderEnd</span>
                </div>
              </div>
            </div>
            <div class="invoice-card mb-4">
              <div class="box">
                <div class="box-content d-flex justify-content-between">
                  <div class="text">
                    <h3>
                      <img src="/imgs/k-shop.svg" alt="shop" loading="lazy" />
                      DJ shop
                    </h3>
                    <p>
                      Total Discount :
                      <span>0 $ </span>
                    </p>
                    <p>
                      Total Amount :
                      <span>{{ $order->total }} $ </span>
                    </p>
                  </div>
                  <div class="text">
                    <h3>
                      <img
                        src="/imgs/k-invoice.svg"
                        alt="shop"
                        loading="lazy"
                      />
                      Invoice for DJ booking
                    </h3>
                    <p>
                      Date:
                      <span>{{ $order->created_at }}</span>
                    </p>
                    <p>
                      Status :
                      <span>Paid </span>
                    </p>
                  </div>
                </div>
                <div class="send">
                  <a href="#"> Send To Email </a>
                  <a href="#"> Print Now </a>
                </div>
              </div>
            </div>
            <div class="details-section">
              <div class="details-left">
                <h3>Details:</h3>
                <p>Name : <span>{{ $order->user->name }}</span></p>
                <p>Date : <span>{{ $order->created_at }}</span></p>
                <p>Invoice number : <span>{{ $order->invoice_number }}</span></p>
                <p>Providers : <span>{{ $order->provider->name}}</span></p>
              </div>
              <div class="details-right">
                <p>Package name : <span>{{ $order->items[0]->orderable->name }}</span></p>
                <h3>Package details :</h3>
                <ul>
                  
                  <li>{{ $order->items[0]->orderable->description }}</li>
                  {{(int)$order->delivery_status}}
                </ul>
              </div>
            </div>
          </div>

          <!-- Track Order Details Section -->
          <section class="col-12 col-lg-4 track-order">
            <h3 class="track-title">Track Order</h3>
            <div class="track-status">
              <!-- Tracking steps content here -->
              <div class="step active " >
                <div class="icon">
                  <img
                    src="/imgs/k-track-order1.svg"
                    alt="track"
                    loading="lazy"
                  />
                </div>
                <div class="content">
                  <h3>Received request</h3>
                  <p>
                    Your request has been successfully received and is being
                    reviewed.
                  </p>
                </div>
              </div>

              <div class="step <?php if((int)$order->delivery_status >=2) echo 'active';?>">
                <div class="icon">
                  <img
                    src="/imgs/k-track-order2.svg"
                    alt="track"
                    loading="lazy"
                  />
                </div>
                <div class="content">
                  <h3>Set the installation</h3>
                  <p>
                    A worker has been assigned to install or deliver the
                    decorations and ornaments to you.
                  </p>
                </div>
              </div>

              <div class="step <?php if((int)$order->delivery_status >=3) echo 'active';?>">
                <div class="icon">
                  <img
                    src="/imgs/k-track-order3.svg"
                    alt="track"
                    loading="lazy"
                  />
                </div>
                <div class="content">
                  <h3>The visit has been scheduled</h3>
                  <p>
                    The appointment is scheduled for 5/3/2024 at 11:00 AM.
                  </p>
                </div>
              </div>

              <div class="step <?php if((int)$order->delivery_status >=4) echo 'active';?>">
                <div class="icon">
                  <img
                    src="/imgs/k-track-order4.svg"
                    alt="track"
                    loading="lazy"
                  />
                </div>
                <div class="content">
                  <h3>worker on the road</h3>
                  <p>Technician on the way to your location</p>
                </div>
              </div>

              <div class="step <?php if((int)$order->delivery_status >=5) echo 'active';?>">
                <div class="icon">
                  <img
                    src="/imgs/k-track-order5.svg"
                    alt="track"
                    loading="lazy"
                  />
                </div>
                <div class="content">
                  <h3>Get started</h3>
                  <p>The worker has started working on your order.</p>
                </div>
              </div>

              <div class="step <?php if((int)$order->delivery_status >=6) echo 'active';?>">
                <div class="icon">
                  <img
                    src="/imgs/k-track-order6.svg"
                    alt="track"
                    loading="lazy"
                  />
                </div>
                <div class="content">
                  <h3>Work completed</h3>
                  <p>
                    Your order has been completed, please rate the service and
                    provide your feedback.
                  </p>
                </div>
              </div>

              <div class="step <?php if((int)$order->delivery_status >=7) echo 'active';?>">
                <div class="icon" onclick="openFeedbackPopup()">
                  <img
                    src="/imgs/k-track-order7.svg"
                    alt="track"
                    loading="lazy"
                  />
                </div>
                <div class="content">
                  <h3>Service feedback</h3>
                  <p>
                    The service has not been rated. Rate it now and get 100
                    coins.
                  </p>
                </div>
              </div>
            </div>
          </section>

          <div id="feedbackPopup" class="popup">
            <div class="popup-content">
              <span class="close" onclick="closeFeedbackPopup()"
                >&times;</span
              >
              <h2>Feedback</h2>
              <form id="feedbackForm">
                <label>
                  <input type="radio" name="rating" value="5" checked />
                  5 star
                  <span class="stars">
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-active-star.svg" alt="star" />
                  </span>
                </label>
                <label>
                  <input type="radio" name="rating" value="4" />
                  4 star
                  <span class="stars">
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-ractive-star.svg" alt="star"
                  /></span>
                </label>
                <label>
                  <input type="radio" name="rating" value="3" />
                  3 star
                  <span class="stars">
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-ractive-star.svg" alt="star" />
                    <img src="/imgs/k-ractive-star.svg" alt="star"
                  /></span>
                </label>
                <label>
                  <input type="radio" name="rating" value="2" />
                  2 star
                  <span class="stars">
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-ractive-star.svg" alt="star" />
                    <img src="/imgs/k-ractive-star.svg" alt="star" />
                    <img src="/imgs/k-ractive-star.svg" alt="star"
                  /></span>
                </label>
                <label>
                  <input type="radio" name="rating" value="1" />
                  1 star
                  <span class="stars">
                    <img src="/imgs/k-active-star.svg" alt="star" />
                    <img src="/imgs/k-ractive-star.svg" alt="star" />
                    <img src="/imgs/k-ractive-star.svg" alt="star" />
                    <img src="/imgs/k-ractive-star.svg" alt="star" />
                    <img src="/imgs/k-ractive-star.svg" alt="star"
                  /></span>
                </label>
                <textarea placeholder="Write us your feedback"></textarea>
                <div class="buttons">
                  <button
                    type="button"
                    class="cancel"
                    onclick="closeFeedbackPopup()"
                  >
                    Cancel
                  </button>
                  <button type="submit" class="send">Send</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="footer-container">
        <div class="footer-logo">
          <h2>
            Gir <img style="width: 30%" src="./imgs/Vectorgir.png" alt="" />
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
            ><img src="{{ asset('') }}imgs/Group 1000004623.png" alt="Facebook"
          /></a>
        </div>
        <div class="footer-apps">
          <h4>Get the app</h4>
          <a href="#"
            ><img
              src="{{ asset('') }}imgs/app-store.24ce31e7a13056d542d1.png"
              alt="App Store"
          /></a>
          <a href="#"
            ><img
              src="{{ asset('') }}imgs/googleApp.8f241223f55c067c2fb6.png"
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

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/orderDetails.js"></script>
  </body>

@endsection


@push('js')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/orderDetails.js') }}"></script>
@endpush
