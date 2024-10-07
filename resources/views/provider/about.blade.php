@extends('layouts.app')
@section('title', "{$provider->name} - About")
@section('content')
<div class="backgroundService">
    <img
      class="backgroundImg col-sm-6 col-md-6"
      src="{{asset($provider->profile_picture)}}"
      alt=""
    />
    <div class="hypernav">
      <a href="{{ route('home') }}">home</a>
      <a href="#">Individual providers</a>
      <a href="#">Providers : {{ $provider->business_name }}</a>
    </div>
    <div class="companyname">
<h1>
    {{ $provider->business_name }}
</h1>
<span>
@php
    $fullStars = floor($provider->averageRating()); 
    $halfStar = $provider->averageRating() - $fullStars >= 0.5 ? 1 : 0;
    $emptyStars = 5 - ($fullStars + $halfStar);
@endphp
@for ($i = 0; $i < $fullStars; $i++)
        <img src="{{ asset('assets') }}/imgs/star-filled.png" alt="Full Star">
    @endfor

    @if ($halfStar)
        <img src="{{ asset('assets') }}/imgs/star-half.png" alt="Half Star">
    @endif

    @for ($i = 0; $i < $emptyStars; $i++)
        <img src="{{ asset('assets') }}/imgs/star-empty.png" alt="Empty Star">
    @endfor
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
        <a class="nav-link m-2" href="{{  route('provider.index' , $provider) }}">Full Page</a>
        <a class="nav-link m-2" href="{{ route('provider.reviews' , $provider) }}">Reviews</a>
        <a class="nav-link m-2" href="{{ route('provider.services' , $provider) }}">Services</a>
        <a class="nav-link m-2" href="{{ route('provider.location' , $provider) }}">Location</a>
        <a class="nav-link m-2 active" href="{{ route('provider.about' , $provider) }}">About</a>
        <a class="nav-link m-2" href="{{ route('provider.packages' , $provider) }}">Packages</a>
      </div>
    </nav>

    <!-- pacckage section -->
    <div class="row col-12 Pacckages">
      Packages
      <img class="Pacckagesicons" src="{{ asset('assets') }}/imgs/Group 1000004403.png" alt="" />
      <img class="PacckagesQR" src="{{ asset('assets') }}/imgs/Frame 1321315269.png" alt="" />
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
                @if($provider->user->type == 'company_provider')
                <label class="customer-details-label">Website</label>
                @endif
                <label class="customer-details-label">License Number</label>
                <label class="customer-details-label">Expiry Date</label>
                <label class="customer-details-label">Country</label>
                <label class="customer-details-label">City</label>
                <label class="customer-details-label">Address</label>
                <label class="customer-details-label">Province</label>
                <label class="customer-details-label">Zip</label>
              </div>
            </div>
            <div class="customer-details-column customer-details-column-right">
              <div class="customer-details-values">
                <p class="customer-details-value">{{ $provider->user->email }}</p>
                <p class="customer-details-value">{{ $provider->user->phone }}</p>
                @if($provider->user->type == 'company_provider')
                <p class="customer-details-value">{{ $provider->website }}</p>
                @endif
                <p class="customer-details-value">{{ $provider->info->license_number ?? 'Not Available' }}</p>
                <p class="customer-details-value">{{ $provider->info->license_expire_date ?? 'Not Available' }}</p>
                <p class="customer-details-value">{{ $provider->info->country ?? 'Not Available' }}</p>
                <p class="customer-details-value">{{ $provider->info->city ?? 'Not Available' }}</p>
                <p class="customer-details-value">{{ $provider->info->address ?? 'Not Available' }}</p>
                <p class="customer-details-value">{{ $provider->info->province ?? 'Not Available' }}</p>
                <p class="customer-details-value">{{ $provider->info->zip_code ?? 'Not Available' }}</p>
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
            {{ $provider->info->mission ?? 'Not Available' }}
          </p>
          <h5 for="">Vision</h5>
          <p>
            {{ $provider->info->vision ?? 'Not Available' }}
          </p>
          <h5 for="">Value</h5>
          <p>
            {{ $provider->info->values ?? 'Not Available' }}
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
            <span>
              <img src="{{ asset($provider->topRatedFeedback->user->profile_picture) }}" alt="">
            </span>
            <span style="font-family: Cairo; font-size: 16px; font-weight: 600; line-height: 16px; letter-spacing: -0.02em; text-align: center;">
              {{ $provider->topRatedFeedback->user->name ?? 'Not Available' }}
              <span>
                <img style="width: 86px; height: 18px;" src="{{ asset('assets') }}/imgs/review.png" alt="">
              </span>
              <p>{{ $provider->topRatedFeedback->user->city ?? 'Not Available' }}</p>
            </span>
          
            <span class="reviewparagraph">
              {{ $provider->topRatedFeedback->feedback_text ?? 'No feedback available.' }}
            </span>
            
            <span class="arrowformore">
              <a href="#">More</a>
            </span>
          </div>          
      </div>
    </div>
    </div>
  @endsection