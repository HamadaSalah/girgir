@extends('provider-panel\layouts\app')

@push('css')
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/service.css" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
@endpush

@section('title', 'Orders')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-4 mt-3">
    <div class="container">
      <strong>New Orders</strong>
      <p>if the order is not accepted it will be cancelled</p>
      @foreach ($orders as $order)
      <div class="card card-custom align-items-center">
        <div style="width: 100%;border-radius: 30px; ">
          <div class="icon">
            <i class="bi bi-file-earmark-text"></i>
          </div>

          <div style="width: 100%">
            <div class="d-flex justify-content-between mb-1" style="width: 100%">
              <div style="flex: 1;">
                <small class="info-text">Site Commission:</small>
                <strong class="info-strong">${{ $order->total * $website_info->withdraw_rate / 100 }}</strong>
              </div>
              <div class="vertical-divider"></div>
              <div style="flex: 1;">
                <small class="info-text">Order Date:</small>
                <strong class="info-strong">{{ $order->created_at->format('d/m/y') }}</strong>
              </div>
              <div class="vertical-divider"></div>
              <div style="flex: 1;">
                <small class="info-text">Execution Date:</small>
                <strong class="info-strong">{{ $order->date_from->format('d/m/y') }}</strong>
              </div>
            </div>

            <div class="d-flex justify-content-between mb-1" style="width: 100%">
              <div style="flex: 1;">
                <small class="info-text">Total Amount:</small>
                <strong class="info-strong">${{ $order->total }}</strong>
              </div>
              <div class="vertical-divider"></div>
              <div style="flex: 1;">
                <small class="info-text">Order Time:</small>
                <strong class="info-strong">{{ $order->created_at->format('h:i') }}</strong>
              </div>
              <div class="vertical-divider"></div>
              <div style="flex: 1;">
                <small class="info-text">Execution Time:</small>
                <strong class="info-strong">{{ $order->date_from->format('h:i') }}</strong>
              </div>
            </div>
          </div>
          
          <div class="status-dot 
            @if($order->status == 'pending')
                pending-status
            @elseif($order->status == 'cancelled')
                cancelled-status
            @else
                inprogress-status
            @endif
        "></div>

        </div>

        <!-- Footer with buttons -->
        <div class="card-footer-custom mt-3" style="border-radius: 30px;">
            <a href="{{ route('provider-panel.orders.show', $order->id) }}">
                <button>Approve Request</button>
              </a>
          <div style="border-left: 1px solid #ccc; height: 40px; margin: 0 10px;"></div>

          <a href="{{ route('provider-panel.orders.show', $order->id) }}">
            <button>Order Details</button>
          </a>
        </div>
      </div>  
      @endforeach

    </div>
  </main>
@endsection